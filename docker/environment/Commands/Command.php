<?php

namespace WinningSoftware\Environment\Commands;

use WinningSoftware\ConsoleColours\ConsoleColour as Console;
use WinningSoftware\Environment\Commands\Output\Output;

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

    protected function writeErrorMessage(string $message): void
    {
        $this->getOutput()
            ->writeMessage(
                'Error: ' . $message,
                Console::text(['bold', 'white']) . Console::bg('red')
            );
    }
}