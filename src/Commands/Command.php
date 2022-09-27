<?php

declare(strict_types=1);

namespace DanielWinning\DevEnvironment\Commands;

class Command
{
    private string $name;
    private array $validFlags;

    public function __construct(string $name, array $flags)
    {
        $this->setName($name);
        $this->setValidFlags($flags);
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    private function setValidFlags(array $flags): void
    {
        $this->validFlags = $flags;
    }

    public function getValidFlags(): array
    {
        return $this->validFlags;
    }

    private function flagsPassed(array $args): array
    {
        $flags = [];

        foreach ($args as $arg) {
            if (in_array($arg, $this->getValidFlags())) {
                $flags[] = $arg;
            }
        }

        return $flags;
    }
}