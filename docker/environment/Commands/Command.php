<?php

namespace WinningSoftware\Environment\Commands;

use WinningSoftware\ConsoleColours\ConsoleColour as Console;
use WinningSoftware\Environment\Commands\Output\Output;

class Command
{
    protected string $name;
    protected Output $output;

    public function __construct()
    {
        $this->setOutput(new Output);
    }

    public function getName(): string
    {
        return $this->name;
    }

    protected function setName(string $name): void
    {
        $this->name = $name;
    }

    protected function getOutput(): Output
    {
        return $this->output;
    }

    private function setOutput(Output $output): void
    {
        $this->output = $output;
    }

    protected function writeErrorMessage(string $message): void
    {
        $this->getOutput()
            ->writeMessage(
                'Error: ' . $message,
                Console::text(['bold', 'bright_white']) . Console::bg('bright_red')
            );
    }

    protected function writeSuccessMessage(string $message): void
    {
        $this->getOutput()
            ->writeMessage(
                $message,
                Console::text(['bold', 'bright_white']) . Console::bg('bright_green')
            );
    }

    protected function getEnvironmentPaths(string $projectName): array
    {
        $dockerDir = __DIR__ . '/../../';
        $dataDir = $dockerDir . 'data/';
        $projectDataDir = $dataDir . $projectName;
        $projectEnvFile = $projectDataDir . '/.env';

        return [
            'dockerDir' => $dockerDir,
            'dataDir' => $dataDir,
            'projectDataDir' => $projectDataDir,
            'projectEnvFile' => $projectEnvFile,
        ];
    }
}