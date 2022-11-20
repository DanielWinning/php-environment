<?php

namespace WinningSoftware\Environment\Commands\Output;

use WinningSoftware\ConsoleColours\ConsoleColour as Console;

class Output
{
    private array $outputTypes;

    public function __construct()
    {

    }

    private function getOutputTypes(): array
    {
        return $this->outputTypes;
    }

    private function setOutputTypes(array $outputTypes): void
    {
        $this->outputTypes = $outputTypes;
    }

    public function writeMessage(string $message, string $modifiers = ''): void
    {
        echo $modifiers . $message . Console::text(['RESET']) . "\n";
    }

    public function blankLine(): void
    {
        echo "\n";
    }
}