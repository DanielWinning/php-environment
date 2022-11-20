<?php

namespace WinningSoftware\Environment\Commands;

class HelpCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
        $this->setName('help');
    }

    public function execute(): void
    {
        $this->writeInfoMessage('Help');
    }
}