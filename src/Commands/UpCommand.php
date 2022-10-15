<?php

namespace DanielWinning\DevEnvironment\Commands;

class UpCommand extends Command
{
    public function __construct()
    {
        parent::__construct('up', ['--name', '--build', '--dir']);
    }

    public function run(array $args = [])
    {
        // Run the command
    }
}