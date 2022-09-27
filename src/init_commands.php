<?php

use DanielWinning\DevEnvironment\Commands\Command;

$upCommand = new Command('up', ['--dir', '--name']);
$downCommand = new Command('down', []);
$stopCommand = new Command('stop', []);

$commands = [
    new Command('up', ['--dir', '--name']),
    new Command('down', []),
    new Command('stop', []),
];

$commandList = [];

foreach ($commands as $command) {
    $commandList[$command->getName()] = [
        'validFlags' => $command->getValidFlags(),
    ];
}

return $commandList;