<?php

namespace WinningSoftware\Environment\Commands;

class StartCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
        $this->setName('start');
    }

    public function execute(array $arguments): void
    {
        if (\count($arguments) !== 2) {
            $this->writeErrorMessage('invalid number of arguments passed to start command');
            exit;
        }

        $name = $arguments[1];
        $dockerDir = __DIR__ . '/../../';
        $dataDir = $dockerDir . 'data/';
        $projectDataDir = $dataDir . $name;
        $projectEnvFile = $projectDataDir . '/.env';

        if (!\file_exists($projectEnvFile)) {
            $this->writeErrorMessage('the project ' . $name . ' does not exist');
            exit;
        }

        \exec("cd $dockerDir && docker-compose -p $name --env-file=$projectEnvFile up -d");
    }
}