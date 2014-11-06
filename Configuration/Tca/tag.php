<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TCA']['tx_sessionplaner_domain_model_tag'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_sessionplaner_domain_model_tag']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'start'
	),
	'columns' => array(
		'label' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_tag-label',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256,
			),
		),
		'sessions' => array(
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_tag-sessions',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_sessionplaner_domain_model_tag',
					// needed for extbase query
				'foreign_table' => 'tx_sessionplaner_domain_model_tag',
				'foreign_table_where' => 'AND tx_sessionplaner_domain_model_tag.pid = ###CURRENT_PID###',
				'MM' => 'tx_sessionplaner_session_tag_mm',
				'MM_opposite_field' => 'sessions',
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
		'0' => array('showitem' => '
            label,
            sessions
        ')
	),
);