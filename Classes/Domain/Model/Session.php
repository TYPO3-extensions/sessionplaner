<?php

class Tx_Sessionplaner_Domain_Model_Session extends Tx_Extbase_DomainObject_AbstractEntity {
	/**
	 * @var string
	 */
	protected $topic = '';

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
	protected $description = '';

	/**
	 * @var string
	 */
	protected $download = '';

	/**
	 * @var Tx_Sessionplaner_Domain_Model_Day
	 */
	protected $day;

	/**
	 * @var Tx_Sessionplaner_Domain_Model_Room
	 */
	protected $room;

	/**
	 * @var Tx_Sessionplaner_Domain_Model_Slot
	 */
	protected $slot;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Sessionplaner_Domain_Model_Tag>
	 * @lazy
	 */
	protected $tags;

	/**
	 * Initialize day, room, slot and tags
	 */
	public function __construct() {
		$this->tags = new Tx_Extbase_Persistence_ObjectStorage();
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
	 * @param \Tx_Extbase_Persistence_ObjectStorage $tags
	 */
	public function setTags($tags) {
		$this->tags = $tags;
	}

	/**
	 * @return \Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getTags() {
		return $this->tags;
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
	 * @param \Tx_Sessionplaner_Domain_Model_Day $day
	 */
	public function setDay($day) {
		$this->day = $day;
	}

	/**
	 * @return \Tx_Sessionplaner_Domain_Model_Day
	 */
	public function getDay() {
		return $this->day;
	}

	/**
	 * @param \Tx_Sessionplaner_Domain_Model_Room $room
	 */
	public function setRoom($room) {
		$this->room = $room;
	}

	/**
	 * @return \Tx_Sessionplaner_Domain_Model_Room
	 */
	public function getRoom() {
		return $this->room;
	}

	/**
	 * @param \Tx_Sessionplaner_Domain_Model_Slot $slot
	 */
	public function setSlot($slot) {
		$this->slot = $slot;
	}

	/**
	 * @return \Tx_Sessionplaner_Domain_Model_Slot
	 */
	public function getSlot() {
		return $this->slot;
	}
}

?>