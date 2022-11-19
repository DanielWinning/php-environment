<?php

namespace DanielWinning\Environment\Builder;

use DanielWinning\Environment\Commands\Command;

class Builder
{
    private array $commands;
    private array $arguments;

    public function __construct(array $arguments)
    {
        \array_shift($arguments);
        $this->setArguments($arguments);
    }

    private function getArguments(): array
    {
        return $this->arguments;
    }

    private function setArguments(array $arguments): void
    {
        $this->arguments = $arguments;
    }

    public function registerCommand(Command $command): void
    {
        $this->commands[$command->getName()] = $command;
    }

    public function registerCommands(array $commands): void
    {
        foreach ($commands as $command) {
            $this->registerCommand($command);
        }
    }

    public function getCommands(): array
    {
        return $this->commands;
    }

    public function run()
    {
        if (!\count($this->getArguments())) {
            echo '-- Help Manual --' . "\n";
            exit;
        }

        if (\array_key_exists($this->getArguments()[0], $this->getCommands())) {
            $this->getCommands()[$this->getArguments()[0]]->execute();
        } else {
            echo 'Command does not exist' . "\n";
        }
    }
}