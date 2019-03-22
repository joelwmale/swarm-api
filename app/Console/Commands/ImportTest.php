<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Swarfarm\Services\ImportService;
use Swarfarm\Users\User;

class ImportTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test importing data from SW exporter';

    /**
     * @var ImportService
     */
    protected $importService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ImportService $importService)
    {
        parent::__construct();

        $this->importService = $importService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Get the import file
        $rawJson = Storage::get('imports/squid.json');

        // Conver the data into a collection
        $importData = collect(json_decode($rawJson, true));

        // Import
        $this->importService->import(User::first(), $importData);
    }
}
