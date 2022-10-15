<?php

namespace DanielWinning\DevEnvironment\Commands;

abstract class Command
{
    public string $name;
    private array $flags;

    public function __construct(string $name, array $flags)
    {
        $this->setName($name);
        $this->setFlags($flags);
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    private function setFlags(array $flags): void
    {
        $this->flags = $flags;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFlags(): array
    {
        return $this->flags;
    }

    private function parseArgs(array $args)
    {
        $cleanArgs = [];

        foreach ($args as $arg) {
            $argAsArray = \explode('=', $arg);
            $cleanArgs[$arg['name']] = [

            ];
        }
    }

    abstract public function run(array $args);
}

/*new Command('up', ['build', 'dir', 'name']);
new Command('down', ['name']);
new Command('stop', ['name']);*/