<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Swarm\Services\SWExportImportService;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ImportProfileJob;
use Imtigger\LaravelJobStatus\JobStatus;
use Illuminate\Http\File;

class SWExporterController extends Controller
{
    /**
     * @var SWExportImportService
     */
    protected $swExportImportService;

    public function __construct(SWExportImportService $swExportImportService)
    {
        $this->swExportImportService = $swExportImportService;
    }

    public function profile(Request $request)
    {
        // Get the user
        $user = $request->user();

        // Store the file
        $path = '/tmp/' . now()->timestamp . '.json';
        file_put_contents($path, json_encode($request->input('profile')));
        $fileUrl = Storage::putFile(config('filesystems.profiles') . "/{$user->id}", new File($path));

        // Dispatch the job
        ImportProfileJob::dispatch($user, $fileUrl, 'sw_proxy_import')->delay(5);

        return response()->json([
            'status' => 'queued'
        ], 200);
    }

    public function log(Request $request)
    {
        // Log a new event for the user
        logger($request->all());
    }

    public function acceptedCommands()
    {
        return response()->json([
            'BuyBlackMarketItem' => [
                'request' => [
                    'wizard_id',
                    'item_no',
                    'item_master_type',
                    'item_master_id',
                ],
                'response' => [
                    'unit_info',
                ],
            ],
        ], 200);
    }
}
