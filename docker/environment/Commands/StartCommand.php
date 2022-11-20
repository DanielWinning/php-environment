<?php

namespace WinningSoftware\Environment\Commands;

class StartCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
        $this->setName('start');
    }

    public function execute(): void
    {
        // Silence
    }
}