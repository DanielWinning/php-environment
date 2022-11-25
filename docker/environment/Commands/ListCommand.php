<?php

namespace WinningSoftware\Environment\Commands;

use WinningSoftware\ConsoleColours\ConsoleColour as Console;

class ListCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
        $this->setName('list');
    }

    public function execute(): void
    {
        $projectIterator = new \FilesystemIterator(__DIR__ . '/../../data/');
        $projects = [];
        $this->getOutput()->writeMessage('Listing known environments:');

        foreach ($projectIterator as $file) {
            if (is_dir($file)) {
                $projects[] = $file->getFilename();
            }
        }

        if (!count($projects)) {
            $this->getOutput()->writeMessage('-- No environments configured --');
        }
        foreach ($projects as $project) {
            $this->getOutput()->writeMessage('-- ' . $project);
        }
    }
}