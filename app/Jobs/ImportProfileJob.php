<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Imtigger\LaravelJobStatus\Trackable;
use App\Models\User;

class ImportProfileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Trackable;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var string
     */
    protected $fileUrl;

    /**
     * @var Swarm\Services\SWExportImportService
     */
    protected $importService;

    /**
     * @var string
     */
    protected $importType;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, string $fileUrl, string $importType)
    {
        // Set up job
        $this->user = $user;
        $this->fileUrl = $fileUrl;
        $this->importType = $importType;

        // Make an import service
        $this->importService = resolve('Swarm\Services\SWExportImportService');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Get the file
        $file = Storage::get($this->fileUrl);

        if (!$file) {
            // @TODO log an error
            logger('Unable to find file for import.', $this->user->toArray());
        }

        // Convert to a collection
        $data = collect(json_decode($file, true));

        // Import it
        $this->importService->import($this->user, $data);
    }

    /**
     * Get the tags that should be assigned to the job.
     *
     * @return array
     */
    public function tags()
    {
        return ['profile_import', $this->importType];
    }
}
