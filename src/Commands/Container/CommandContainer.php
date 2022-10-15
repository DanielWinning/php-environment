<?php

namespace DanielWinning\DevEnvironment\Commands\Container;

use DanielWinning\DevEnvironment\Commands\Command;
use DanielWinning\DevEnvironment\Commands\UpCommand;

class CommandContainer
{
    private array $commands;

    public function __construct()
    {
        $this->registerCommands();
    }

    private function registerCommands()
    {
        $this->commands = [
            new UpCommand(),
            new DownCommand(),
            new StopCommand(),
        ];
    }
}