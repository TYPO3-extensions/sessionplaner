<?php
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

/**
 * An display controller
 */
class Tx_Sessionplaner_Controller_EditController extends Tx_Extbase_MVC_Controller_ActionController {
	/**
	 * @var Tx_Sessionplaner_Domain_Repository_DayRepository
	 */
	protected $dayRepository;

	/**
	 * @var Tx_Sessionplaner_Domain_Repository_SessionRepository
	 */
	protected $sessionRepository;

	/**
	 * @param Tx_Sessionplaner_Domain_Repository_DayRepository $repository
	 * @return void
	 */
	public function injectDayRepository(Tx_Sessionplaner_Domain_Repository_DayRepository $repository) {
		$this->dayRepository = $repository;
	}

	/**
	 * @param Tx_Sessionplaner_Domain_Repository_SessionRepository $repository
	 * @return void
	 */
	public function injectSessionRepository(Tx_Sessionplaner_Domain_Repository_SessionRepository $repository) {
		$this->sessionRepository = $repository;
	}

	/**
	 * @return void
	 */
	public function showAction() {

	}
}

?>