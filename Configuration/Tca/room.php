<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TCA']['tx_sessionplaner_domain_model_room'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_sessionplaner_domain_model_room']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'name'
	),
	'columns' => array(
		'name' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_room-name',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256,
			),
		),
		'logo' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_room-logo',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
				'uploadfolder' => 'uploads/tx_sessionplaner',
				'show_thumbs' => 1,
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'seats' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_room-seats',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'int',
				'max'  => 256,
			),
		),
		'days' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_room-days',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_sessionplaner_domain_model_day',
					// needed for extbase query
				'foreign_table' => 'tx_sessionplaner_domain_model_day',
				'foreign_where' => 'pid = ###CURRENT_PID### ORDER BY tx_sessionplaner_domain_model_day.name',
				'MM' => 'tx_sessionplaner_day_room_mm',
				'MM_opposite_field' => 'rooms',
				'size' => 5,
				'minitems' => 0,
				'maxitems' => 100,
				'wizards' => array(
					'suggest' => array(
						'type' => 'suggest',
					),
				),
			),
		),
		'slots' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_room-slots',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_sessionplaner_domain_model_slot',
					// needed for extbase query
				'foreign_table' => 'tx_sessionplaner_domain_model_slot',
				'foreign_where' => 'pid = ###CURRENT_PID###',
				'MM' => 'tx_sessionplaner_room_slot_mm',
				'size' => 5,
				'minitems' => 0,
				'maxitems' => 100,
				'wizards' => array(
					'suggest' => array(
						'type' => 'suggest',
					),
				),
			),
		),
		'sessions' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_room-sessions',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_sessionplaner_domain_model_session',
				'foreign_where' => 'roomt = ###CURRENT_PID###',
				'foreign_field' => 'room',
				'size' => 5,
			),
		),
	),
	'types' => array(
		'0' => array('showitem' => 'name, logo, seats, days, slots, sessions')
	),
);

?>