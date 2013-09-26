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

class Day extends AbstractEntity {

	/**
	 * @var \string
	 */
	protected $name = '';

	/**
	 * @var \string
	 */
	protected $date = '';

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SP\Sessionplaner\Domain\Model\Room>
	 * @lazy
	 */
	protected $rooms;

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SP\Sessionplaner\Domain\Model\Slot>
	 * @lazy
	 */
	protected $slots;

	public function __construct() {
		$this->rooms = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->slots = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $rooms
	 */
	public function setRooms(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $rooms) {
		$this->rooms = $rooms;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getRooms() {
		return $this->rooms;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $slots
	 */
	public function setSlots(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $slots) {
		$this->slots = $slots;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getSlots() {
		return $this->slots;
	}
}

?>