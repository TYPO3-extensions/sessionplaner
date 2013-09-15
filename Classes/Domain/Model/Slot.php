<?php

class Tx_Sessionplaner_Domain_Model_Slot extends Tx_Extbase_DomainObject_AbstractEntity {
	/**
	 * @var \DateTime
	 */
	protected $start = '';

	/**
	 * @var integer
	 */
	protected $duration = 0;

	/**
	 * @var boolean
	 */
	protected $break = FALSE;

	/**
	 * @var boolean
	 */
	protected $noBreakAfter = FALSE;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Sessionplaner_Domain_Model_Day>
	 * @lazy
	 */
	protected $days;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Sessionplaner_Domain_Model_Room>
	 * @lazy
	 */
	protected $rooms;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Sessionplaner_Domain_Model_Session>
	 * @lazy
	 */
	protected $sessions;

	public function __construct() {
		$this->days = new Tx_Extbase_Persistence_ObjectStorage();
		$this->rooms = new Tx_Extbase_Persistence_ObjectStorage();
		$this->sessions = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * @param boolean $break
	 */
	public function setBreak($break) {
		$this->break = $break;
	}

	/**
	 * @return boolean
	 */
	public function getBreak() {
		return $this->break;
	}

	/**
	 * @param \Tx_Extbase_Persistence_ObjectStorage $days
	 */
	public function setDays($days) {
		$this->days = $days;
	}

	/**
	 * @return \Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getDays() {
		return $this->days;
	}

	/**
	 * @param int $duration
	 */
	public function setDuration($duration) {
		$this->duration = $duration;
	}

	/**
	 * @return int
	 */
	public function getDuration() {
		return $this->duration;
	}

	/**
	 * @param boolean $noBreakAfter
	 */
	public function setNoBreakAfter($noBreakAfter) {
		$this->noBreakAfter = $noBreakAfter;
	}

	/**
	 * @return boolean
	 */
	public function getNoBreakAfter() {
		return $this->noBreakAfter;
	}

	/**
	 * @param \Tx_Extbase_Persistence_ObjectStorage $rooms
	 */
	public function setRooms($rooms) {
		$this->rooms = $rooms;
	}

	/**
	 * @return \Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getRooms() {
		return $this->rooms;
	}

	/**
	 * @param \Tx_Extbase_Persistence_ObjectStorage $sessions
	 */
	public function setSessions($sessions) {
		$this->sessions = $sessions;
	}

	/**
	 * @return \Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getSessions() {
		return $this->sessions;
	}

	/**
	 * @param \DateTime $start
	 */
	public function setStart($start) {
		$this->start = $start;
	}

	/**
	 * @return \DateTime
	 */
	public function getStart() {
		return $this->start;
	}
}

?>