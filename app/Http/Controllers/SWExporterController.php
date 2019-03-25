<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Swarm\Services\SWExportImportService;
use Swarm\Users\User;

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
        // @TODO hits a memory issue.
        // @TODO should save the file and import it later with a queue
        // $request->all() is the same as the .json import
        $this->swExportImportService->import($request->user(), collect($request->all()));
    }

    public function log(Request $request)
    {
        // Log a new event for the user
        logger($request->all());
    }

    public function acceptedCommands()
    {
        return response()->json([
            'BuyBlacKMarketItem' => [
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
