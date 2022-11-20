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
        }
    }
}