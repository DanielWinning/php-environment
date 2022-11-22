<?php

namespace WinningSoftware\Environment\Commands;

class DestroyCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
        $this->setName('destroy');
    }

    public function execute(array $arguments): void
    {
        if (\count($arguments) !== 2) {
            $this->writeErrorMessage('invalid number of arguments supplied to destroy command');
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

        \exec("cd $dockerDir && docker-compose -p $name down");
        \unlink($projectEnvFile);

        if (\file_exists($projectDataDir . 'mysql/')) {
            $fileSystemIterator = new \FilesystemIterator($projectDataDir . 'mysql/');

            foreach ($fileSystemIterator as $file) {
                \unlink($file);
            }

            \rmdir($projectDataDir . 'mysql/');
        }

        \rmdir($projectDataDir);
    }
}