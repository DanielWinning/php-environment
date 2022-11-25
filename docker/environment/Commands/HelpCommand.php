<?php

namespace WinningSoftware\Environment\Commands;

use WinningSoftware\ConsoleColours\ConsoleColour as Console;

class HelpCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
        $this->setName('help');
    }

    public function execute(): void
    {
        $output = $this->getOutput();

        $output->writeMessage('PHP Environment Setup', Console::text(['bold', 'blue']));
        $output->blankLine();
        $output->writeMessage('-- phpenv build <name> <path>      : Build a new named environment and start it');
        $output->writeMessage('-- phpenv start <name>             : Start a named environment');
        $output->writeMessage('-- phpenv stop <name>              : Stops the named environment');
        $output->writeMessage('-- phpenv destroy <name>           : Destroys the named environment');
    }
}