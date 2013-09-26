<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TCA']['tx_sessionplaner_domain_model_day'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_sessionplaner_domain_model_day']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'name'
	),
	'columns' => array(
		'name' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_day-name',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256,
			),
		),
		'date' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_day-date',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'date',
				'max'  => 256,
			),
		),
		'rooms' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_day-rooms',
			'config' => array(
				'type' => 'select',
				'allowed' => 'tx_sessionplaner_domain_model_room',
					// needed for extbase query
				'foreign_table' => 'tx_sessionplaner_domain_model_room',
				'foreign_where' => 'pid = ###CURRENT_PID###',
				'MM' => 'tx_sessionplaner_day_room_mm',
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
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_day-slots',
			'config' => array(
				'type' => 'select',
				'allowed' => 'tx_sessionplaner_domain_model_slot',
					// needed for extbase query
				'foreign_table' => 'tx_sessionplaner_domain_model_slot',
				'foreign_where' => 'pid = ###CURRENT_PID###',
				'MM' => 'tx_sessionplaner_day_slot_mm',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 100,
				'wizards' => array(
					'suggest' => array(
						'type' => 'suggest',
					),
				),
			),
		),
	),
	'types' => array(
		'0' => array('showitem' => 'name, date, rooms, slots')
	),
);

?>