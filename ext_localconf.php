<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

t3lib_extMgm::addPItoST43($_EXTKEY, 'Classes/Controller/Pi1.php', '_pi1', 'list_type', 1);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Display',
	array(
		'Display' => 'listDays, showDay, showRoom, listSessions, screen',
	),
	array(
		'Display' => '',
	)
);

?>