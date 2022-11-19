<?php

namespace DanielWinning\Environment\Commands;

class Command
{
    protected string $name;

    public function getName(): string
    {
        return $this->name;
    }

    protected function setName(string $name): void
    {
        $this->name = $name;
    }
}