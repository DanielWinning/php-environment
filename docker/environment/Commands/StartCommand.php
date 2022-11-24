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

        $this->getOutput()->writeMessage('Starting ' . $name);

        $paths = $this->getEnvironmentPaths($name);

        if (!\file_exists($paths['projectEnvFile'])) {
            $this->writeErrorMessage('the project ' . $name . ' does not exist');
            exit;
        }

        \exec("cd {$paths['dockerDir']} && docker-compose -p $name --env-file={$paths['projectEnvFile']} up -d");
        $this->writeSuccessMessage('Environment started');
    }
}