<?php

namespace DanielWinning\Environment\Commands;

class BuildCommand extends Command
{
    public function __construct()
    {
        $this->setName('build');
    }

    public function execute(): void
    {
        echo 'Hello, build command!' . "\n";
    }
}