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
		if ($this->request->hasArgument('day')) {
			$day = $this->dayRepository->findByUid($this->request->getArgument('day'));
		} else {
			/** @var \Evoweb\Sessionplaner\Domain\Model\Day $day */
			$day = $this->dayRepository->findAll()->getFirst();
		}

		$this->view->assign('currentDay', $day);
		$this->view->assign('roomCount', is_object($day) ? count($day->getRooms()) : 0);
		$this->view->assign('days', $this->dayRepository->findAll());
		$this->view->assign('unassignedSessions', $this->sessionRepository->findByDayAndEmptySlot($day));
	}

	/**
	 * @param \Evoweb\Sessionplaner\Domain\Model\Session $session
	 */
	public function suggestFormAction(\Evoweb\Sessionplaner\Domain\Model\Session $session = NULL) {
			// Has a session been submitted?
		if ($session === NULL) {
				// Get a blank one
			$session = $this->objectManager->get('Evoweb\\Sessionplaner\\Domain\\Model\\Session');
		}
		$this->view->assign('session', $session);
	}

	/**
	 * @param \Evoweb\Sessionplaner\Domain\Model\Session $session
	 */
	public function suggestSaveAction(\Evoweb\Sessionplaner\Domain\Model\Session $session = NULL) {
		if ($session === NULL) {
				// redirect to drop unwanted parameters
			$this->redirect('suggestForm');
		}
		$this->sessionRepository->add($session);

			// Add Success Flash Message
		/** @var $flashMessage \TYPO3\CMS\Core\Messaging\FlashMessage */
		$flashMessage = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
			'TYPO3\\CMS\\Core\\Messaging\\FlashMessage',
			\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('yourSessionIsSaved', 'sessionplaner'),
			$title = '',
			\TYPO3\CMS\Core\Messaging\FlashMessage::OK,
			TRUE
		);
		$this->controllerContext->getFlashMessageQueue()->enqueue($flashMessage);

			// Redirect to prevent multiple entries through reloading
		$this->redirect('suggestForm');
	}

	/**
	 * Disable error flash message
	 *
	 * @return boolean
	 */
	protected function getErrorFlashMessage() {
		return FALSE;
	}
}

?>