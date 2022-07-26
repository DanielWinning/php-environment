<?php

namespace WinningSoftware\Environment\Commands;

class BuildCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
        $this->setName('build');
    }

    public function execute(array $arguments): void
    {
        if (\count($arguments) !== 3) {
            $this->writeErrorMessage('invalid number of arguments supplied to the build command');
            exit;
        }

        $name = $arguments[1];
        $path = $arguments[2];

        if (!\file_exists($path)) {
            $this->writeErrorMessage('the specified path does not exist');
            exit;
        }

        if (\file_exists(__DIR__ . '/../../data/' . $name)) {
            $this->writeErrorMessage(
                'a project with this name already exists. You can either destroy the existing environment, or define your new environment with a different name'
            );
            exit;
        }

        $this->getOutput()->writeMessage('Building environment, hang tight');

        $dockerDir = __DIR__ . '/../../';
        $dataDir = $dockerDir . 'data/';

        \mkdir($dataDir . $name, 0755, true);

        $projectConfigDir = $dataDir . $name;

        \file_put_contents($projectConfigDir . '/.env', 'PROJECTDIR=' . $path . PHP_EOL . 'PROJECTNAME=' . $name);

        $changeDirCommand = "cd $dockerDir";
        $dockerComposeCommand = "docker-compose -p $name --env-file=$projectConfigDir/.env up --build -d";

        \exec("$changeDirCommand && $dockerComposeCommand 2>&1", $output, $error);

        $this->writeSuccessMessage('Environment built');
    }
}