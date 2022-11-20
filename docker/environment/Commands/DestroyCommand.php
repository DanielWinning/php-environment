<?php

namespace DanielWinning\Environment\Commands;

class DestroyCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
        $this->setName('destroy');
    }

    public function execute(): void
    {
        // Silence
    }
}