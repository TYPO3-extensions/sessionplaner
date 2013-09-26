<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TCA']['tx_sessionplaner_domain_model_session'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_sessionplaner_domain_model_session']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'name'
	),
	'columns' => array(
		'topic' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-topic',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max' => 256,
			),
		),
		'speaker' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-speaker',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max' => 256,
			),
		),
		'twitter' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-twitter',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim',
				'max' => 256,
			),
		),
		'attendees' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-attendees',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'int',
				'max' => 256,
			),
		),
		'description' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-description',
			'config' => array(
				'type' => 'text'
			),
		),
		'download' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-download',
			'config' => array(
			'type' => 'input',
				'size' => 20,
				'eval' => 'trim',
				'max' => 256,
			),
		),
		'type' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-type',
			'config' => array(
				'type' => 'select',
				'items' => array(
					'0'=> array(
						'0' => SP_LLL . 'notassigned',
					),
				),
			),
		),
		'level' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-level',
			'config' => array(
				'type' => 'select',
				'items' => array(
					'0'=> array(
						'0' => SP_LLL . 'notassigned',
					),
				),
			),
		),
		'day' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-day',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_sessionplaner_domain_model_day',
				'foreign_where' => 'pid = ###CURRENT_PID###',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'items' => array(
					'0'=> array(
						'0' => SP_LLL . 'notassigned',
					),
				),
				'wizards' => array(
					'suggest' => array(
						'type' => 'suggest',
					),
				),
			),
		),
		'room' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-room',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_sessionplaner_domain_model_room',
				'foreign_where' => 'pid = ###CURRENT_PID###',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'items' => array(
					'0'=> array(
						'0' => SP_LLL . 'notassigned',
					),
				),
				'wizards' => array(
					'suggest' => array(
						'type' => 'suggest',
					),
				),
			),
		),
		'slot' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-slot',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_sessionplaner_domain_model_slot',
				'foreign_where' => 'pid = ###CURRENT_PID###',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'items' => array(
					'0'=> array(
						'0' => SP_LLL . 'notassigned',
					),
				),
				'wizards' => array(
					'suggest' => array(
						'type' => 'suggest',
					),
				),
			),
		),
		'tags' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-tags',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_sessionplaner_domain_model_tag',
					// needed for extbase query
				'foreign_table' => 'tx_sessionplaner_domain_model_tag',
				'foreign_where' => 'pid = ###CURRENT_PID###',
				'MM' => 'tx_sessionplaner_session_tag_mm',
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
		'0' => array('showitem' => 'topic, speaker, twitter, attendees, download, description,
		--div--; Relations, type, level, day, room, slot, tags')
	),
);

?>