<?php

namespace StarfolkSoftware\Redo\Commands;

use Illuminate\Console\Command;

class RedoCommand extends Command
{
    public $signature = 'redo';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
