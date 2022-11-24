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
        $paths = $this->getEnvironmentPaths($name);

        if (!\file_exists($paths['projectEnvFile'])) {
            $this->writeErrorMessage('the project ' . $name . ' does not exist');
            exit;
        }

        $this->getOutput()->writeMessage('Removing environment');

        \exec("cd {$paths['dockerDir']} && docker-compose --env-file={$paths['projectEnvFile']} -p $name down");
        \unlink($paths['projectEnvFile']);

        if (\file_exists($paths['projectDataDir'] . '/mysql')) {
            $fileSystemIterator = new \FilesystemIterator($paths['projectDataDir'] . '/mysql');

            foreach ($fileSystemIterator as $file) {
                if (\is_dir($file)) {
                    $directoryIterator = new \FilesystemIterator($file);

                    foreach ($directoryIterator as $nestedFile) {
                        \unlink($nestedFile);
                    }

                    \rmdir($file);
                } else {
                    \unlink($file);
                }
            }

            \rmdir($paths['projectDataDir'] . '/mysql/');
        }

        \rmdir($paths['projectDataDir']);

        $this->writeSuccessMessage('Environment destroyed');
    }
}