<?php

namespace DanielWinning\DevEnvironment\Commands;

class StopCommand extends Command
{
    public function __construct(array $flags)
    {
        parent::__construct('up', $flags);
    }

    public function run(array $args)
    {
        // Run the command
    }
}