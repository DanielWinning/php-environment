<?php

namespace DanielWinning\Environment\Commands;

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
            $this->writeErrorMessage('Error: Invalid number of arguments supplied to the build command');
            exit;
        }

        $name = $arguments[1];
        $path = $arguments[2];

        if (!\file_exists($path)) {
            $this->writeErrorMessage('Error: The specified path does not exist');
            exit;
        }
    }
}