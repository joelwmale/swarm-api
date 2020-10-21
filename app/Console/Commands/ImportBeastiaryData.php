<?php

namespace App\Console\Commands;

use Storage;
use Illuminate\Support\Str;
use App\Models\Monster;
use Illuminate\Console\Command;
use App\Models\MonsterSkill;

class ImportBeastiaryData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:monster-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import monster data';

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
     * @return mixed
     */
    public function handle()
    {
        $baseUrl = 'https://swarfarm.com/static/herders/images/monsters/';

        // Get the import file
        $rawJson = Storage::get('data/beast_data.json');

        // Conver the data into a collection
        $beastiaryData = json_decode($rawJson, true);

        foreach ($beastiaryData as $data) {
            // Get the beast and determine
            $data = collect($data['fields']);
            $type = $this->determineType($data->toArray());

            if ($type === 'monster') {
                // These are skills
                if (Str::contains($data->get('name'), 'Imperfect')) {
                    // Skip imperfects, not real mons
                    continue;
                }

                // Get the monster id
                $monsterId = $data->get('is_awakened') ? $data->get('com2us_id') : substr($data->get('com2us_id'), 0, 3);

                if (! $monster = Monster::find($monsterId)) {
                    $this->line('Could not find monster with id: '.$monsterId);
                }

                if (! $monster = Monster::find($data->get('com2us_id'))) {
                    $this->line('Still could not find monster');

                    // See if we should replace the family id
                    if (! $monster = Monster::find($this->replaceFamilyId($data->get('com2us_id')))) {
                        $this->line('Giving up on finding monster');
                        dd($data);
                        continue;
                    }
                }

                $fileName = $monster->id.'.png';

                // Download the image
                $path = base_path('resources/src/assets/images/monsters').'/'.$fileName;
                if (! file_exists($path)) {
                    copy($baseUrl.$data->get('image_filename'), $path);
                }

                $monster->update([
                    'icon' => $fileName,
                    'skillups' => $data->get('skill_ups_to_max') ?: 0,
                    'awaken_material' => $data->toArray(),
                ]);
            }

            if ($type === 'skill') {
                MonsterSkill::create($data->toArray());
            }
        }
    }

    protected function determineType(array $data): string
    {
        // @TODO monsters can be awakened,
        // runes have 'skill_icon' in the name: icon_filename (skill_icon_0006_9_5.png)
        if (array_key_exists('level_progress_description', $data) || array_key_exists('slot', $data)) {
            return 'skill';
        }

        if (array_key_exists('skill_ups_to_max', $data) || array_key_exists('is_awakened', $data)) {
            return 'monster';
        }

        $this->info('Couldnt determine type: '.json_encode($data));

        return null;
    }

    protected function replaceFamilyId(int $com2usId)
    {
        // com2us_id family id in the beastiary.json => the actual monster family id
        $map = [
            // Anubis
            4010 => 2040,
            // Phoenix
            4020 => 1450,
            // Golem
            4030 => 1140,
            // Sylphid
            4040 => 1190,
            // Undine
            4050 => 1160,
            // Inferno
            4060 => 1170,
            // Ifrit
            1710 => 1920,
            // Awakened
            1711 => 1921,
            // Homunculus (atk)
            100010 => 100011,
            // Homunculus (support)
            100020 => 100021,
        ];

        foreach ($map as $key => $val) {
            if (Str::contains($com2usId, $key)) {
                return str_replace($key, $val, $com2usId);
            }
        }

        return $com2usId;
    }
}
