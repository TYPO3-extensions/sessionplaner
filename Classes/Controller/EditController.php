<?php
namespace Evoweb\Sessionplaner\Controller;
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
class EditController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	/**
	 * @var \Evoweb\Sessionplaner\Domain\Repository\DayRepository
	 */
	protected $dayRepository;

	/**
	 * @var \Evoweb\Sessionplaner\Domain\Repository\SessionRepository
	 */
	protected $sessionRepository;

	/**
	 * @param \Evoweb\Sessionplaner\Domain\Repository\DayRepository $repository
	 * @return void
	 */
	public function injectDayRepository(\Evoweb\Sessionplaner\Domain\Repository\DayRepository $repository) {
		$this->dayRepository = $repository;
	}

	/**
	 * @param \Evoweb\Sessionplaner\Domain\Repository\SessionRepository $repository
	 * @return void
	 */
	public function injectSessionRepository(\Evoweb\Sessionplaner\Domain\Repository\SessionRepository $repository) {
		$this->sessionRepository = $repository;
	}

	/**
	 * @return void
	 */
	public function showAction() {

	}
}

?>