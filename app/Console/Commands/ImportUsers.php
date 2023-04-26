<?php

namespace App\Console\Commands;

use App\Services\Contracts\ImportContract;
use Exception;
use Illuminate\Console\Command;
use Throwable;

class ImportUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Users from API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ImportContract $service)
    {
        try {
            $service->importFromAPI();
        } catch (Throwable $e) {
            dump($e->getMessage());

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
