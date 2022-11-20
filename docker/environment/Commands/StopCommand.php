<?php

namespace DanielWinning\Environment\Commands;

class StopCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
        $this->setName('stop');
    }

    public function execute(): void
    {
        // Silence
    }
}