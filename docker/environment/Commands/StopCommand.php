<?php

namespace WinningSoftware\Environment\Commands;

class StopCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
        $this->setName('stop');
    }

    public function execute(array $arguments): void
    {
        if (\count($arguments) !== 2) {
            $this->writeErrorMessage('invalid number of arguments supplied to the stop command');
            exit;
        }

        $name = $arguments[1];
        $paths = $this->getEnvironmentPaths($name);
        $dockerDir = __DIR__ . '/../../';

        $this->getOutput()->writeMessage('Stopping containers for ' . $name);
        exec("cd {$paths['dockerDir']} && docker-compose -p $name --env-file={$paths['projectEnvFile']} stop");
        $this->writeSuccessMessage('Environment powered down');
    }
}