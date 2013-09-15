<?php

class Tx_Sessionplaner_Domain_Model_Room extends Tx_Extbase_DomainObject_AbstractEntity {
	/**
	 * @var string
	 */
	protected $name = '';

	/**
	 * @var string
	 */
	protected $logo = '';

	/**
	 * @var integer
	 */
	protected $seats = 0;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Sessionplaner_Domain_Model_Slot>
	 * @lazy
	 */
	protected $days;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Sessionplaner_Domain_Model_Slot>
	 * @lazy
	 */
	protected $slots;

    /**
     * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Sessionplaner_Domain_Model_Session>
     * @lazy
     */
    protected $sessions;

	/**
	 * Initialize days and slots
	 */
	public function __construct() {
		$this->days = new Tx_Extbase_Persistence_ObjectStorage();
		$this->slots = new Tx_Extbase_Persistence_ObjectStorage();
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
	 * @param string $logo
	 */
	public function setLogo($logo) {
		$this->logo = $logo;
	}

	/**
	 * @return string
	 */
	public function getLogo() {
		return $this->logo;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param integer $seats
	 */
	public function setSeats($seats) {
		$this->seats = $seats;
	}

	/**
	 * @return integer
	 */
	public function getSeats() {
		return $this->seats;
	}

	/**
	 * @param \Tx_Extbase_Persistence_ObjectStorage $slots
	 */
	public function setSlots($slots) {
		$this->slots = $slots;
	}

	/**
	 * @return \Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getSlots() {
		return $this->slots;
	}

	/**
	 * @return \Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getSessions() {
		return $this->sessions;
	}
}

?>