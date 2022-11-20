<?php

namespace WinningSoftware\Environment\Commands\Output;

use WinningSoftware\ConsoleColours\ConsoleColour;

class Output
{
    private array $outputTypes;

    public function __construct()
    {
        $this->setOutputTypes([
            OutputType::INFO => ConsoleColour::FG_BLUE,
            OutputType::SUCCESS => ConsoleColour::BG_BRIGHT_GREEN . ConsoleColour::FG_WHITE,
            OutputType::ERROR => ConsoleColour::BG_RED . ConsoleColour::FG_WHITE,
            OutputType::TEXT => ConsoleColour::FG_WHITE,
        ]);
    }

    private function getOutputTypes(): array
    {
        return $this->outputTypes;
    }

    private function setOutputTypes(array $outputTypes): void
    {
        $this->outputTypes = $outputTypes;
    }

    public function writeMessage(string $message, string $type)
    {
        if (\array_key_exists($type, $this->getOutputTypes())) {
            echo $this->getOutputTypes()[$type] . $message . ConsoleColour::RESET . "\n";
        }
    }
}