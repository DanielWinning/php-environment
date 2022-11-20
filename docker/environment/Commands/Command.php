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

    private function setOutput(Output $output)
    {
        $this->output = $output;
    }

    protected function writeErrorMessage(string $message): void
    {
        $this->getOutput()->writeMessage($message, OutputType::ERROR);
    }

    protected function writeSuccessMessage(string $message): void
    {
        $this->getOutput()->writeMessage($message, OutputType::SUCCESS);
    }

    protected function writeInfoMessage(string $message): void
    {
        $this->getOutput()->writeMessage($message, OutputType::INFO);
    }

    protected function writeTextMessage(string $message): void
    {
        $this->getOutput()->writeMessage($message, OutputType::TEXT);
    }
}