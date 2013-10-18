<?php
namespace Evoweb\Sessionplaner\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Sebastian Fische <typo3@evoweb.de>
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

class AjaxController {
	/**
	 * @var \TYPO3\CMS\Core\Authentication\BackendUserAuthentication
	 */
	protected $backendUser;

	/**
	 * @var array
	 */
	protected $moduleConfiguration;

	/**
	 * @var array
	 */
	protected $allowedActions = array('addSession', 'updateSession');

	/**
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 */
	protected $objectManager;

	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
	 */
	protected $configurationManager;

	/**
	 * @var \TYPO3\CMS\Core\Http\AjaxRequestHandler
	 */
	protected $ajaxRequestHandler;

	/**
	 * @var array
	 */
	protected $parameter;

	/**
	 * @var string
	 */
	protected $actionMethodName;

	/**
	 * @var array
	 */
	protected $request;

	/**
	 * @var boolean
	 */
	protected $isProcessed = FALSE;

	/**
	 * @var \Evoweb\Sessionplaner\Domain\Repository\SessionRepository
	 */
	protected $repository;

	/**
	 * @var string
	 */
	protected $status = 'success';

	/**
	 * @var string
	 */
	protected $message = '';

	/**
	 * @var array
	 */
	protected $data;

	/**
	 * @return self
	 */
	public function __construct() {
		$this->backendUser = $GLOBALS['BE_USER'];

		$this->moduleConfiguration = $GLOBALS['TBE_MODULES']['_configuration']['web_SessionplanerTxSessionplanerM1'];

		$this->request = \TYPO3\CMS\Core\Utility\GeneralUtility::_GPmerged('tx_sessionplaner');

		if (!($this->backendUser->isAdmin() || $this->backendUser->modAccess($this->moduleConfiguration, 0))) {
			$this->actionMethodName = 'errorAction';
		} else {
			if (isset($this->request['action']) && in_array($this->request['action'], $this->allowedActions)) {
				$this->actionMethodName = $this->request['action'] . 'Action';
			}
		}

		$this->objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
		$this->configurationManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager');
	}

	/**
	 * @param array $parameter
	 * @param \TYPO3\CMS\Core\Http\AjaxRequestHandler $ajaxRequestHandler
	 * @return boolean
	 */
	public function dispatch($parameter, $ajaxRequestHandler) {
		$this->initializeAction($parameter, $ajaxRequestHandler);
		$this->callActionMethod();
		$this->render();

		return TRUE;
	}

	/**
	 * @param array $parameter
	 * @param \TYPO3\CMS\Core\Http\AjaxRequestHandler $ajaxRequestHandler
	 * @return void
	 */
	protected function initializeAction($parameter, $ajaxRequestHandler) {
		$this->parameter = $parameter;

		$this->ajaxRequestHandler = $ajaxRequestHandler;
		$this->ajaxRequestHandler->setContentFormat('json');

		$configuration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		if (empty($configuration['persistence']['storagePid'])) {
			$currentPid['persistence']['storagePid'] = $_REQUEST['id'];
			$this->configurationManager->setConfiguration(array_merge($configuration, $currentPid));
		}
	}

	/**
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\InfiniteLoopException
	 * @return void
	 */
	protected function callActionMethod() {
		$dispatchLoopCount = 0;
		while ($this->isProcessed === FALSE) {
			if ($dispatchLoopCount++ > 99) {
				throw new \TYPO3\CMS\Extbase\Mvc\Exception\InfiniteLoopException('Could not ultimately dispatch the request after ' . $dispatchLoopCount . ' iterations. Most probably, a @ignorevalidation or @dontvalidate (old propertymapper) annotation is missing on re-displaying a form with validation errors.', 1217839467);
			}
			$this->isProcessed = TRUE;

			$actionInitializationMethodName = 'initialize' . ucfirst($this->actionMethodName);
			if (method_exists($this, $actionInitializationMethodName)) {
				call_user_func(array($this, $actionInitializationMethodName));
			}

			call_user_func(array($this, $this->actionMethodName));
		}
	}

	/***
	 * @return void
	 */
	protected function render() {
		$this->ajaxRequestHandler->setContent(array('status' => $this->status, 'message' => $this->message, 'data' => $this->data));
	}

	/**
	 * @return void
	 */
	protected function errorAction() {
		$this->status = 'error';
		$this->message = 'No access granted';
	}


	/**
	 * @return void
	 */
	protected function initializeAddSessionAction() {
		$this->repository = $this->objectManager->get('Evoweb\\Sessionplaner\\Domain\\Repository\\SessionRepository');
	}

	/**
	 * @return void
	 */
	protected function addSessionAction() {
		$session = $this->getSessionFromRequest();
		if ($session instanceof \Evoweb\Sessionplaner\Domain\Model\Session) {
			$this->repository->add($session);

			$this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager')->persistAll();

			$this->message = 'Session ' . $session->getTopic() . ' saved';
			$this->data = array('uid' => $session->getUid());
		} else {
			$this->status = 'error';
			$this->message = 'Request did not contain valid data';
		}
	}

	/**
	 * @return void
	 */
	protected function initializeUpdateSessionAction() {
		$this->repository = $this->objectManager->get('Evoweb\\Sessionplaner\\Domain\\Repository\\SessionRepository');
	}

	/**
	 * @return void
	 */
	protected function updateSessionAction() {
		/** @var \Evoweb\Sessionplaner\Domain\Model\Session $session */
		$session = $this->repository->findByUid((int) $this->request['session']['uid']);
		$this->updateSessionFromRequest($session);
		if ($session instanceof \Evoweb\Sessionplaner\Domain\Model\Session) {
			$this->repository->update($session);

			$this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager')->persistAll();

			$this->message = 'Session ' . $session->getTopic() . ' updated';
			$this->data = array('uid' => $session->getUid());
		} else {
			$this->status = 'error';
			$this->message = 'Request did not contain valid data';
		}
	}


	/**
	 * @return \Evoweb\Sessionplaner\Domain\Model\Session
	 */
	protected function getSessionFromRequest() {
		return $this->objectManager
			->get('TYPO3\\CMS\\Extbase\\Property\\PropertyMapper')
			->convert($this->request['session'], 'Evoweb\\Sessionplaner\\Domain\\Model\\Session');
	}

	/**
	 * @param \Evoweb\Sessionplaner\Domain\Model\Session $session
	 * @return \Evoweb\Sessionplaner\Domain\Model\Session
	 */
	protected function updateSessionFromRequest($session) {
		$this->objectManager
			->get('TYPO3\\CMS\\Extbase\\Property\\Mapper')
			->map(array_keys($this->request['session']), $this->request['session'], $session);

			// the following lines are needed to move the session back to stash
		if (isset($this->request['session']['room']) && $this->request['session']['room'] == 0) {
			$session->setRoom(0);
		}
		if (isset($this->request['session']['slot']) && $this->request['session']['slot'] == 0) {
			$session->setSlot(0);
		}
	}
}

?>