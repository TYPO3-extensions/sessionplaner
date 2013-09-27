<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}


/**
 * Default PageTS
 */
/** @noinspection PhpUndefinedVariableInspection */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
	'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/PageTS/ModWizards.ts">'
);


/**
 * Configure Frontend Plugin
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Evoweb.' . $_EXTKEY,
	'Display',
	array(
		'Display' => 'listDays, showDay, showRoom, listSessions, screen',
	),
	array()
);

/**
 * Configure Frontend Plugin
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Evoweb.' . $_EXTKEY,
	'Edit',
	array(
		'Edit' => 'suggestForm, suggestSave',
	),
	array(
		'Edit' => 'suggestForm, suggestSave',
	)
);

?>