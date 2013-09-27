<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

/**
 * @todo remove later
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPItoST43($_EXTKEY, 'Classes/Controller/Pi1.php', '_pi1', 'list_type', 1);


/**
 * Default PageTS
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:'.$_EXTKEY.'/Configuration/PageTS/ModWizards.ts">');


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

?>