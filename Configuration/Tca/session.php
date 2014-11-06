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
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'suggestion' => array(
			'exclude' => 1,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-suggestion',
			'config' => array(
				'type' => 'check',
			),
		),
		'social' => array(
			'exclude' => 1,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-social',
			'config' => array(
				'type' => 'check',
				'default' => '1'
			),
		),
		'donotlink' => array(
			'exclude' => 1,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-donotlink',
			'config' => array(
				'type' => 'check',
			),
		),
		'topic' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-topic',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim,required',
				'max' => 256,
			),
		),
		'speaker' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-speaker',
			'config' => array(
				'type' => 'input',
				'size' => 40,
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
		'documents' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-download',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('documents', array(
			    'foreign_types' => array(
				'0' => array(
				    'showitem' => '
					--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
					--palette--;;filePalette'
				),
				\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
				    'showitem' => '
					--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
					--palette--;;filePalette'
				),
				\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
				    'showitem' => '
					--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
					--palette--;;filePalette'
				),
				\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
				    'showitem' => '
					--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
					--palette--;;filePalette'
				),
				\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
				    'showitem' => '
					--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
					--palette--;;filePalette'
				),
				\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
				    'showitem' => '
					--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
					--palette--;;filePalette'
				),
			    ),
			    'minitems' => 0,
			    'maxitems' => 100
			)
		    ),
		),
		'type' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-type',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array(SP_LLL . 'notassigned', 0),
					array(SP_LLL . 'tx_sessionplaner_domain_model_session-type-talk', 1),
					array(SP_LLL . 'tx_sessionplaner_domain_model_session-type-tutorial', 2),
					array(SP_LLL . 'tx_sessionplaner_domain_model_session-type-workshop', 3),
					array(SP_LLL . 'tx_sessionplaner_domain_model_session-type-wish', 6),
					array(SP_LLL . 'tx_sessionplaner_domain_model_session-type-other', 4),
					array(SP_LLL . 'tx_sessionplaner_domain_model_session-type-break', 5),
				),
			),
		),
		'level' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-level',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array(SP_LLL . 'notassigned', 0),
					array(SP_LLL . 'tx_sessionplaner_domain_model_session-level-starter', 1),
					array(SP_LLL . 'tx_sessionplaner_domain_model_session-level-advanced', 2),
					array(SP_LLL . 'tx_sessionplaner_domain_model_session-level-pro', 3),
				),
			),
		),
		'day' => array(
			'exclude' => 0,
			'label' => SP_LLL . 'tx_sessionplaner_domain_model_session-day',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_sessionplaner_domain_model_day',
				'foreign_table_where' => 'AND tx_sessionplaner_domain_model_day.pid = ###CURRENT_PID###',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'items' => array(
					'0' => array(
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
				'foreign_table_where' => 'AND tx_sessionplaner_domain_model_room.pid = ###CURRENT_PID###',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'items' => array(
					'0' => array(
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
				'foreign_table_where' => 'AND tx_sessionplaner_domain_model_slot.pid = ###CURRENT_PID###',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'items' => array(
					'0' => array(
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
				'foreign_table_where' => 'AND tx_sessionplaner_domain_model_tag.pid = ###CURRENT_PID###',
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
		'0' => array('showitem' => '
			hidden;;1,
			suggestion;;1,
			social;;1,
			donotlink;;1,
			topic,
			speaker,
			twitter,
			attendees,
			documents,
			description,
			--div--;
			Relations,
			type,
			level,
			day,
			room,
			slot,
			tags
		')
	),
);