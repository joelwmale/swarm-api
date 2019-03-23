<?php

namespace App\Console\Commands;

use Swarm\Users\User;
use Illuminate\Console\Command;
use Swarm\Services\SWExportImportService;
use Illuminate\Support\Facades\Storage;

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
    public function __construct(SWExportImportService $importService)
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

        // Import test
        $this->importService->import(User::first(), $importData);
    }
}
