<?php

namespace App\Console\Commands;

use App\Models\PlayerRune;
use App\Services\EfficiencyService;
use Illuminate\Console\Command;

class TestRuneEfficiency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:rune-efficiency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test a runes efficiency';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(EfficiencyService $efficiencyService)
    {
        $lapis1Rune = PlayerRune::where('rune_id', 25635637476)->first();
        $janssen2Rune = PlayerRune::where('rune_id', 33116522141)->first();

        dd($efficiencyService->determineCurrentRuneEfficiency($janssen2Rune));
    }
}
