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

class Session extends AbstractEntity {

	/**
	 * @var string
	 */
	protected $topic = '';

	/**
	 * @var string
	 */
	protected $description = '';

	/**
	 * @var string
	 */
	protected $speaker = '';

	/**
	 * @var string
	 */
	protected $twitter = '';

	/**
	 * @var integer
	 */
	protected $attendees = 0;

	/**
	 * @var integer
	 */
	protected $type = 0;

	/**
	 * @var integer
	 */
	protected $level = 0;

	/**
	 * @var string
	 */
	protected $download = '';

	/**
	 * @var \SP\Sessionplaner\Domain\Model\Day
	 */
	protected $day;

	/**
	 * @var \SP\Sessionplaner\Domain\Model\Room
	 */
	protected $room;

	/**
	 * @var \SP\Sessionplaner\Domain\Model\Slot
	 */
	protected $slot;

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SP\Sessionplaner\Domain\Model\Tag>
	 * @lazy
	 */
	protected $tags;

	/**
	 * Initialize day, room, slot and tags
	 */
	public function __construct() {
		$this->tags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * @param string $topic
	 */
	public function setTopic($topic) {
		$this->topic = $topic;
	}

	/**
	 * @return string
	 */
	public function getTopic() {
		return $this->topic;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $speaker
	 */
	public function setSpeaker($speaker) {
		$this->speaker = $speaker;
	}

	/**
	 * @return string
	 */
	public function getSpeaker() {
		return $this->speaker;
	}

	/**
	 * @param string $twitter
	 */
	public function setTwitter($twitter) {
		$this->twitter = $twitter;
	}

	/**
	 * @return string
	 */
	public function getTwitter() {
		return $this->twitter;
	}

	/**
	 * @param int $attendees
	 */
	public function setAttendees($attendees) {
		$this->attendees = $attendees;
	}

	/**
	 * @return int
	 */
	public function getAttendees() {
		return $this->attendees;
	}

	/**
	 * @param int $type
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * @return int
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param int $level
	 */
	public function setLevel($level) {
		$this->level = $level;
	}

	/**
	 * @return int
	 */
	public function getLevel() {
		return $this->level;
	}

	/**
	 * @param string $download
	 */
	public function setDownload($download) {
		$this->download = $download;
	}

	/**
	 * @return string
	 */
	public function getDownload() {
		return $this->download;
	}

	/**
	 * @param \SP\Sessionplaner\Domain\Model\Day $day
	 */
	public function setDay(\SP\Sessionplaner\Domain\Model\Day $day) {
		$this->day = $day;
	}

	/**
	 * @return \SP\Sessionplaner\Domain\Model\Day
	 */
	public function getDay() {
		return $this->day;
	}

	/**
	 * @param \SP\Sessionplaner\Domain\Model\Room $room
	 */
	public function setRoom(\SP\Sessionplaner\Domain\Model\Room $room) {
		$this->room = $room;
	}

	/**
	 * @return \SP\Sessionplaner\Domain\Model\Room
	 */
	public function getRoom() {
		return $this->room;
	}

	/**
	 * @param \SP\Sessionplaner\Domain\Model\Slot $slot
	 */
	public function setSlot(\SP\Sessionplaner\Domain\Model\Slot $slot) {
		$this->slot = $slot;
	}

	/**
	 * @return \SP\Sessionplaner\Domain\Model\Slot
	 */
	public function getSlot() {
		return $this->slot;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $tags
	 */
	public function setTags(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tags) {
		$this->tags = $tags;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getTags() {
		return $this->tags;
	}

}

?>