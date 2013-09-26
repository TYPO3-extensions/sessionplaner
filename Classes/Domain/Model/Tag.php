<?php
namespace SP\Sessionplaner\Domain\Model;
use \TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Sebastian Fischer <typo3@evoweb.de>
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

class Tag extends AbstractEntity {

	/**
	 * @var string
	 */
	protected $label = '';

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SP\Sessionplaner\Domain\Model\Session>
	 * @lazy
	 */
	protected $sessions;

	/**
	 * Initialize day, room, slot and tags
	 */
	public function __construct() {
		$this->sessions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * @param string $label
	 */
	public function setLabel($label) {
		$this->label = $label;
	}

	/**
	 * @return string
	 */
	public function getLabel() {
		return $this->label;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sessions
	 */
	public function setSessions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sessions) {
		$this->sessions = $sessions;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getSessions() {
		return $this->sessions;
	}

}

?>