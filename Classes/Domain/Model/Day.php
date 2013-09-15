<?php

class Tx_Sessionplaner_Domain_Model_Day extends Tx_Extbase_DomainObject_AbstractEntity {
	/**
	 * @var string
	 */
	protected $name = '';

	/**
	 * @var string
	 */
	protected $date = '';

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Sessionplaner_Domain_Model_Room>
	 * @lazy
	 */
	protected $rooms;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Sessionplaner_Domain_Model_Room>
	 * @lazy
	 */
	protected $slots;

	public function __construct() {
		$this->rooms = new Tx_Extbase_Persistence_ObjectStorage();
		$this->slots = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * @param string $date
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * @return string
	 */
	public function getDate() {
		return $this->date;
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
}

?>