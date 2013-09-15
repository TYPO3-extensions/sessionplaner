<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TCA']['tx_sessionplaner_domain_model_slot'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_sessionplaner_domain_model_slot']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'start'
	),
	'columns' => array(
		'start' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_slot-start',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'time,required',
				'max'  => 256,
			),
		),
		'duration' => array(
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_slot-duration',
			'config' => Array (
				'type' => 'input',
				'size' => 20,
				'eval' => 'int,trim,required',
				'default' => 45,
				'max'  => 256,
			)
		),
		'break' => array(
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_slot-break',
			'config' => array(
				'type' => 'check',
			),
		),
		'days' => array(
			'exclude' => 1,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_slot-days',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_sessionplaner_domain_model_day',
					// needed for extbase query
				'foreign_table' => 'tx_sessionplaner_domain_model_day',
				'foreign_where' => 'pid = ###CURRENT_PID###',
				'MM' => 'tx_sessionplaner_day_slot_mm',
				'MM_opposite_field' => 'slots',
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
		'rooms' => array(
			'exclude' => 1,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_slot-rooms',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_sessionplaner_domain_model_room',
					// needed for extbase query
				'foreign_table' => 'tx_sessionplaner_domain_model_room',
				'foreign_where' => 'pid = ###CURRENT_PID###',
				'MM' => 'tx_sessionplaner_room_slot_mm',
				'MM_opposite_field' => 'slots',
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
	),
	'types' => array(
		'0' => array('showitem' => 'start, duration, break, days, rooms')
	),
);

?>