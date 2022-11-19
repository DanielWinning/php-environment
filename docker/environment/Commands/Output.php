<?php

namespace DanielWinning\Environment\Commands;

class Output
{
    private array $outputTypes;

    public function __construct()
    {
        $this->setOutputTypes([
            OutputType::INFO,
            OutputType::SUCCESS,
            OutputType::ERROR,
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

    }
}