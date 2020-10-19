<?php
namespace kostya\configuration\test;
require "../../../vendor/autoload.php";
use kostya\configuration\PhpArrayConfiguration;
$array = [
    'locations' => [
        //те локации в которые сохраняются бекапы
        'input' => [
            'directory' => [
                'input1' => [
                    'path' => 'C:\backups'
                ],
                'input2' => [
                    'path' => 'D:\kostya\backups'
                ]
            ],
            'cloud' => [
                'mega' => [
                    'url' =>'url',
                ],
                'google' => [
                    'url' =>'url',
                ],
            ],
        ],
        //те локации из которых беруться бекапы
        'output' => [
            'directory' => [
                'the-brain' => [
                    'path' => 'D:\kostya\Desktop\TheBrainBackups',
                    'inputs' => ['input1', 'input2', 'mega', 'google'],
                ]
            ],
        ]
    ],
];

$phpArrayConfiguration = new PhpArrayConfiguration();
$phpArrayConfiguration->setArray($array);
$phpArrayConfiguration->write();
define('TEST_MODE',true);
$phpArrayConfiguration->read();
