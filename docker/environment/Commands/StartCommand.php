<?php

namespace DanielWinning\Environment\Commands;

class StartCommand extends Command
{
    public function __construct()
    {
        $this->setName('start');
    }

    public function execute(): void
    {
        echo 'Hello, start command!' . "\n";
    }
}