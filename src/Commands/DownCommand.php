<?php

namespace DanielWinning\DevEnvironment\Commands;

class DownCommand extends Command
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