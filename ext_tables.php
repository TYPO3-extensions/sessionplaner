<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

define('SP_LLL', 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_tca.xml:');

$GLOBALS['TCA']['tx_sessionplaner_domain_model_day'] = array(
	'ctrl' => array(
		'title' => SP_LLL . 'tx_sessionplaner_domain_model_day',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'default_sortby' => 'ORDER BY date',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/Tca/day.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sessionplaner_domain_model_day.gif',
	),
);
t3lib_extMgm::allowTableOnStandardPages('tx_sessionplaner_domain_model_day');


$GLOBALS['TCA']['tx_sessionplaner_domain_model_room'] = array(
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/Tca/room.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sessionplaner_domain_model_room.gif',
	),
);
t3lib_extMgm::allowTableOnStandardPages('tx_sessionplaner_domain_model_room');


$GLOBALS['TCA']['tx_sessionplaner_domain_model_slot'] = array(
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/Tca/slot.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sessionplaner_domain_model_slot.gif',
	),
);
t3lib_extMgm::allowTableOnStandardPages('tx_sessionplaner_domain_model_slot');


$GLOBALS['TCA']['tx_sessionplaner_domain_model_session'] = array(
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/Tca/session.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sessionplaner_domain_model_session.gif',
	),
);
t3lib_extMgm::allowTableOnStandardPages('tx_sessionplaner_domain_model_session');


$GLOBALS['TCA']['tx_sessionplaner_domain_model_tag'] = array(
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/Tca/tag.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_sessionplaner_domain_model_tag.gif',
	),
);
t3lib_extMgm::allowTableOnStandardPages('tx_sessionplaner_domain_model_session');


Tx_Extbase_Utility_Extension::registerModule(
	$_EXTKEY,
	'web',
	'tx_sessionplaner_m1',
	'',
	array(
		'Edit' => 'show',
	),
	array(
		'access' => 'user,group',
		'icon' => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/sessionplaner_module.gif',
		'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod.xml',
	)
);


t3lib_div::loadTCA('tt_content');
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['sessionplaner_display'] = 'layout, select_key';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['sessionplaner_display'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue('sessionplaner_display', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/Display.xml');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Display',
	'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_be.xml:tt_content.list_type_display',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'
);

?>