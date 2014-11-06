<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}


/** @noinspection PhpUndefinedVariableInspection */
define('SP_LLL', 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_tca.xml:');


/**
 * Add Static Configuration Files
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Sessionplan');


/**
 * Day
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sessionplaner_domain_model_day');
$TCA['tx_sessionplaner_domain_model_day'] = array(
	'ctrl' => array(
		'title' => SP_LLL . 'tx_sessionplaner_domain_model_day',
		'label' => 'name',
		'label_alt' => 'date',
		'label_alt_force' => 1,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'default_sortby' => 'ORDER BY date',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/Tca/day.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/sessionplaner_day.png'
	),
);


/**
 * Room
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sessionplaner_domain_model_room');
$TCA['tx_sessionplaner_domain_model_room'] = array(
	'ctrl' => array(
		'title' => SP_LLL . 'tx_sessionplaner_domain_model_room',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/Tca/room.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/sessionplaner_room.png',
	),
);


/**
 * Slot
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sessionplaner_domain_model_slot');
$TCA['tx_sessionplaner_domain_model_slot'] = array(
	'ctrl' => array(
		'title' => SP_LLL . 'tx_sessionplaner_domain_model_slot',
		'label' => 'start',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'default_sortby' => 'ORDER BY start',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/Tca/slot.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/sessionplaner_slot.png',
	),
);


/**
 * Session
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sessionplaner_domain_model_session');
$TCA['tx_sessionplaner_domain_model_session'] = array(
	'ctrl' => array(
		'title' => SP_LLL . 'tx_sessionplaner_domain_model_session',
		'label' => 'topic',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'default_sortby' => 'ORDER BY topic',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/Tca/session.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/sessionplaner_session.png',
	),
);


/**
 * Tag
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sessionplaner_domain_model_session');
$TCA['tx_sessionplaner_domain_model_tag'] = array(
	'ctrl' => array(
		'title' => SP_LLL . 'tx_sessionplaner_domain_model_tag',
		'label' => 'label',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'default_sortby' => 'ORDER BY label',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/Tca/tag.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/sessionplaner_tag.png',
	),
);


if (TYPO3_MODE === 'BE') {
	/**
	 * Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'Evoweb.' . $_EXTKEY,
		'web',
		'tx_sessionplaner_m1',
		'',
		array(
			'Edit' => 'show',
		),
		array(
			'access' => 'user,group',
			'icon' => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/sessionplaner_module.png',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod.xml',
		)
	);

	$GLOBALS['TYPO3_CONF_VARS']['BE']['AJAX']['Sessionplaner'] =
		'EXT:sessionplaner/Classes/Controller/AjaxController.php:&Evoweb\\Sessionplaner\\Controller\\AjaxController->dispatch';
}


/**
 * Frontend Plugin Session Suggest
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Evoweb.' . $_EXTKEY,
	'Suggest',
	'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_be.xml:tt_content.list_type_suggest',
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'ext_icon.gif'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['sessionplaner_suggest'] = 'layout, select_key';


/**
 * Frontend Plugin Session
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Evoweb.' . $_EXTKEY,
	'Session',
	'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_be.xml:tt_content.list_type_session',
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'ext_icon.gif'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['sessionplaner_session'] = 'layout, select_key';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['sessionplaner_session'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'sessionplaner_session',
    'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/Session.xml'
);


/**
 * Frontend Plugin Sessionplan
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Evoweb.' . $_EXTKEY,
	'Sessionplan',
	'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_be.xml:tt_content.list_type_sessionplan',
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'ext_icon.gif'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['sessionplaner_sessionplan'] = 'layout, select_key';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['sessionplaner_sessionplan'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'sessionplaner_sessionplan',
    'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/Sessionplan.xml'
);

?>