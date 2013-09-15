<?php

class Tx_Sessionplaner_Domain_Model_Tag extends Tx_Extbase_DomainObject_AbstractEntity {
	/**
	 * @var string
	 */
	protected $label = '';

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Sessionplaner_Domain_Model_Session>
	 * @lazy
	 */
	protected $sessions;

	/**
	 * Initialize day, room, slot and tags
	 */
	public function __construct() {
		$this->sessions = new Tx_Extbase_Persistence_ObjectStorage();
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
}

?>