<?php

namespace WinningSoftware\Environment\Commands;

use WinningSoftware\Environment\Commands\Output\Output;
use WinningSoftware\Environment\Commands\Output\OutputType;

class Command
{
    protected string $name;
    protected Output $output;

    public function __construct()
    {
        $this->setOutput(new Output);
    }

    public function getName(): string
    {
        return $this->name;
    }

    protected function setName(string $name): void
    {
        $this->name = $name;
    }

    protected function getOutput(): Output
    {
        return $this->output;
    }

    private function setOutput(Output $output): void
    {
        $this->output = $output;
    }
}