<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2012 Xaver Maierhofer <xaver.maierhofer@xwissen.info>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

class tx_sessionplaner_pi1 extends tslib_pibase {
	public $prefixId = 'tx_sessionplaner_pi1';
	public $scriptRelPath = 'Resources/Private/Language/locallang.xml';
	public $extKey = 'sessionplaner';
	public $pi_checkCHash = TRUE;

	/**
	 * @var array
	 */
	protected $tags = array();

	/**
	 * @var array
	 */
	protected $performer = array();

	/**
	 * @var array
	 */
	protected $sessiontyp = array();

	/**
	 * @var array
	 */
	protected $slides = array('Slideshare');

	/**
	 * @var string
	 */
	protected $preloadTwitter;

	/**
	 * @var boolean
	 */
	protected $screen = FALSE;

	/**
	 * @var string
	 */
	protected $templatePath = 'EXT:sessionplaner/Resources/Private/Templates/';

	/**
	 * @param string $content
	 * @param array $conf
	 * @return string
	 */
	public function main($content, $conf) {
		$this->init($conf);
		$template = $this->cObj->fileResource($this->templatePath . 'Plan.html');
		$daylistTemplate = $this->cObj->getSubpart($template, '###DAYLIST###');
		$sessionsTemplate = $this->cObj->getSubpart($template, '###SESSIONS###');

		$subparts = array(
			'dayList' => $this->renderDaylist($this->findDays(), $daylistTemplate),
			'sessions' => $this->renderSessions($this->findSessions(), $sessionsTemplate),
		);

		if (!$this->screen) {
			$subparts['content'] = $this->filterbox();
		} else {
			$subparts['content'] = $this->cObj->getSubpart($template, '###REFRESH###');
		}

		$content .= $this->cObj->substituteSubpartArray($template, $subparts);
		$content = $this->cObj->substituteMarker($content, '###TWITTER###', implode("", $this->preloadTwitter));
		return $content;
	}

	/**
	 * @param array $days
	 * @param string $template
	 * @return string
	 */
	protected function renderDaylist($days, $template) {
		$roomImageTemplate = $this->cObj->getSubpart($template, '###ROOM_EMPTY_IMAGE###');
		$roomFilledTemplate = $this->cObj->getSubpart($template, '###ROOM_FILLED##');
		$sessionTemplate = $this->cObj->getSubpart($template, '###SESSION###');
		$sessionInfoTemplate = $this->cObj->getSubpart($sessionTemplate, '###SESSION_INFO###');

		$result = array();
		foreach ($days as $day) {
			$dayMarker = array(
				'day' => strtolower($day['name']),
				'name' => $day['name'],
			);

			$rooms = array();
			foreach ($day['room'] as $room) {
				$roomTemplate = !empty($roow['image']) ? $roomImageTemplate : $roomFilledTemplate;

				$roomMarker = array(
					'image' => $room['image'],
					'name' => $room['name'],
				);

				$sessions = array();
				foreach ($room['position'] as $kPosition => $vPosition) {
					$session = $vPosition['session'];
					$sessionMarker = array(
						'md5' => md5($session['name'] . $day['name'] . $room['name'] . $kPosition . $session['part']),
						'tooltip' => $this->getTooltipContent($session),
						'position' => $kPosition,
					);

					if (is_array($session)) {
						$sessionInfoMarker = array(
							'name' => $session['name'],
							'speaker' => trim($session['performer'], ' ,'),
						);

						$sessionInfo = $this->cObj->substituteMarkerArray($sessionInfoTemplate, $sessionInfoMarker, '###|###', TRUE);

						$this->performer = array_merge($this->performer, t3lib_div::trimExplode(',', $session['performer']));
					} else {
						$sessionInfo = '';
					}

					$sessionContent = $this->cObj->substituteSubpart($sessionTemplate, '###SESSION_INFO###', $sessionInfo);
					$sessions[] = $this->cObj->substituteMarkerArray($sessionContent, $sessionMarker, '###|###', TRUE);
				}

				$roomContent = $this->cObj->substituteSubpart($roomTemplate, '###SESSION###', implode(LF, $sessions));
				$rooms[] = $this->cObj->substituteMarkerArray($roomContent, $roomMarker, '###|###', TRUE);
			}

			$dayContent = $this->cObj->substituteMarkerArray($template, $dayMarker, '###|###', TRUE);
			$dayContent = $this->cObj->substituteSubpart($dayContent, '###ROOM###', implode(LF, $rooms));
			$result[] = $this->replaceLanguageMarker($dayContent);
		}

		return implode(LF, $result);
	}

	/**
	 * @param array $sessions
	 * @param string $template
	 * @return string
	 */
	protected function renderSessions($sessions, $template) {
		$itemTemplate = $this->replaceLanguageMarker($this->cObj->getSubpart($template, '###ITEM###'));

		$items = array();
		foreach ($sessions as $session) {
			if (!is_array($session)) {
				continue;
			}

			$marker = array(
				'key' => md5($session['name'] . $session['part']),
				'tooltip' => $this->getTooltipContent($session),
				'name' => $session['name'],
				'speaker' => trim($session['performer'], ', '),
			);
			$items[] = $this->cObj->substituteMarkerArray($itemTemplate, $marker, '###|###', TRUE);

			$this->performer = array_merge($this->performer, t3lib_div::trimExplode(',', $session['performer']));
		}

		return $this->cObj->substituteSubpart($template, '###ITEM###', implode(LF, $items));
	}

	/**
	 * @param array $conf
	 */
	protected function init($conf) {
		$this->conf = $conf;
		$this->pi_loadLL();

		if (t3lib_div::_GP('screen') == TRUE) {
			$this->screen = TRUE;
		}

		if ($this->conf['templatePath']) {
			$this->templatePath = $this->conf['templatePath'];
		}
	}

	/**
	 * @return array
	 */
	protected function findDays() {
		$plan = unserialize(file_get_contents('uploads/tx_sessionplaner/plan'));
		return (array) $plan['day'];
	}

	/**
	 * @return array
	 */
	protected function findSessions() {
		return (array) unserialize(file_get_contents('uploads/tx_sessionplaner/sessionpool'));
	}

	/**
	 * @param array $session
	 * @return string
	 */
	protected function getTooltipContent($session) {
		$content = $img = '';

		if ($session['twittername']) {
			$this->preloadTwitter[$session['twittername']] .= '<img src="https://api.twitter.com/1/users/profile_image?screen_name=' . $session['twittername'] . '&amp;size=normal">';
			$img = '<a class="twitterimg" href="https://twitter.com/' . $session['twittername'] . '" target="_blank">
				<img src="https://api.twitter.com/1/users/profile_image?screen_name=' . $session['twittername'] . '&amp;size=normal" ></a>';
		}

		if ($session['sessiontyp']) {
			$content .= '<b>' . $this->pi_getLL('type') . '</b><br/>' . $session['sessiontyp'] . '<br>';
			$this->sessiontyp[] = $session['sessiontyp'];
		}

		if ($session['tags']) {
			$content .= '<strong>' . $this->pi_getLL('tags') . '</strong><br/>' . trim($session['tags'], ', ') . '<br/>';
			$this->tags = array_merge($this->tags, t3lib_div::trimExplode(',', $session['tags']));
		}

		if ($session['slideshare']) {
			$content .= '<br/><a href="' . $session['slideshare'] . '">' . $this->pi_getLL('slideshare_download') . '</a>';
		}

		return $img . ($content ? '<div class="tooltipinfo">' . $content . '</div>' : '');
	}

	/**
	 * @return string
	 */
	protected function filterbox() {
		$template = $this->cObj->fileResource($this->templatePath . 'Filterbox.html');
		$filterTemplate = $this->cObj->getSubpart($template, '###FILTER###');

		$marker = array(
			'time' => time() * 1000,
		);

		$this->tags = array_unique($this->tags);
		$filter = $this->renderFilterItems($this->tags, 'Tags', $filterTemplate);

		$this->performer = array_unique($this->performer);
		$filter .= $this->renderFilterItems($this->performer, 'Users', $filterTemplate);

		$this->sessiontyp = array_unique($this->sessiontyp);
		$filter .= $this->renderFilterItems($this->sessiontyp, 'Sessiontyp', $filterTemplate);

		$this->slides = array_unique($this->slides);
		$filter .= $this->renderFilterItems($this->slides, 'Slideshare verfügbar', $filterTemplate);

		$content = $this->cObj->substituteSubpart($template, '###FILTER###', $filter);
		$content = $this->cObj->substituteMarkerArray($content, $marker, '###|###', TRUE);
		return $this->replaceLanguageMarker($content);
	}

	/**
	 * @param array $values
	 * @param string $title
	 * @param string $template
	 * @return string
	 */
	protected function renderFilterItems(array $values, $title, $template) {
		$itemTemplate = $this->cObj->getSubpart($template, '###ITEM###');

		asort($values);
		$items = array();
		foreach ($values as $value) {
			$value = trim($value, ', ');
			if (!empty($value)) {
				$items[] = $this->cObj->substituteMarker($itemTemplate, '###VALUE###', $value);
			}
		}

		$content = $this->cObj->substituteSubpart($template, '###ITEM###', implode(LF, $items));
		$content = $this->cObj->substituteMarker($content, '###TITLE###', $title);
		return $content;
	}

	/**
	 * @param string $content
	 * @return string
	 */
	protected function replaceLanguageMarker($content) {
		return preg_replace_callback('~###LABEL_([a-z0-9_-]+)###~i', array($this, 'translateMarker'), $content);
	}

	/**
	 * @param array $match
	 * @return string
	 */
	protected function translateMarker(array $match) {
		return $this->pi_getLL(strtolower($match[1]), strtolower($match[1]));
	}
}

if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/tx_sessionplaner_pi1/pi1/class.tx_sessionplaner_pi1.php'])	{
	/** @noinspection PhpIncludeInspection */
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/tx_sessionplaner_pi1/pi1/class.tx_sessionplaner_pi1.php']);
}

?>