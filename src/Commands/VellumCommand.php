<?php

namespace Ejntaylor\Vellum\Commands;

use Illuminate\Console\Command;

class VellumCommand extends Command
{
    public $signature = 'vellum';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
