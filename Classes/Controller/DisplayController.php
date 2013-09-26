<?php
namespace SP\Sessionplaner\Controller;
use \TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

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
class DisplayController extends ActionController {

	/**
	 * @var \SP\Sessionplaner\Domain\Repository\DayRepository
	 */
	protected $dayRepository;

	/**
	 * @var \SP\Sessionplaner\Domain\Repository\SessionRepository
	 */
	protected $sessionRepository;

	/**
	 * @param \SP\Sessionplaner\Domain\Repository\DayRepository $repository
	 * @return void
	 */
	public function injectDayRepository(\SP\Sessionplaner\Domain\Repository\DayRepository $repository) {
		$this->dayRepository = $repository;
	}

	/**
	 * @param \SP\Sessionplaner\Domain\Repository\SessionRepository $repository
	 * @return void
	 */
	public function injectSessionRepository(\SP\Sessionplaner\Domain\Repository\SessionRepository $repository) {
		$this->sessionRepository = $repository;
	}

	/**
	 * @return void
	 */
	public function listDaysAction() {
		$days = $this->dayRepository->findAll();
		$days->rewind();
		$this->view->assign('days', $days);
	}

	/**
	 * @return void
	 */
	public function showDay() {

	}

	/**
	 * @return void
	 */
	public function showRoom() {

	}

	/**
	 * @return void
	 */
	public function listSessions() {

	}

	/**
	 * @return void
	 */
	public function screenAction() {

	}

}

?>