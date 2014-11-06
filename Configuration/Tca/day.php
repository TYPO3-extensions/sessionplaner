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
                'foreign_table' => 'tx_sessionplaner_domain_model_room',
                'foreign_table_where' => 'AND tx_sessionplaner_domain_model_room.pid = ###CURRENT_PID###',
                'MM' => 'tx_sessionplaner_day_room_mm',
                'size' => 6,
                'minitems' => 0,
                'maxitems' => 100,
                'autoSizeMax' => 20,
            ),
        ),
        'slots' => array(
            'exclude' => 0,
            'label' => SP_LLL . 'tx_sessionplaner_domain_model_day-slots',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_sessionplaner_domain_model_slot',
                'foreign_table_where' => 'AND tx_sessionplaner_domain_model_slot.pid = ###CURRENT_PID### ORDER BY tx_sessionplaner_domain_model_slot.start',
                'MM' => 'tx_sessionplaner_day_slot_mm',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 100,
                'autoSizeMax' => 100,
            ),
        ),
    ),
    'types' => array(
        '0' => array('showitem' => '
            name,
            date,
            rooms,
            slots
        ')
    ),
);