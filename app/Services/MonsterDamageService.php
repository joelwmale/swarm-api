<?php

namespace App\Services;

class MonsterDamageService
{
    /**
     * Substitute any placeholders for the monsters real stats
     * (e.g {ATK} for the monsters real attack)
     *
     * @param string $stats
     * @param string $formula
     *
     * @return string
     */
    public function substituteStats(array $stats, string $formula): string
    {
        // Get text that is surrounded by square brackets
        preg_match_all("/\[{^}]*\]/i", $formula, $matches);

        // Found macros that are surrounded by square brackets
        $foundPlaceholders = collect($matches[0]);

        // Parse the template and replace the macros that are replaceable
        foreach ($foundPlaceholders as $placeholder) {
            // Escape it
            $parse = preg_quote($placeholder, '#');

            // Replace the template string
            $formula = preg_replace_callback(
                "#({$parse})#i",
                function ($matches) use ($stats, $placeholder) {
                    return $stats[$this->placeholderToUnitStat($placeholder)];
                },
                $formula
            );
        }

        return stripcslashes($formula);
    }

    /**
     * Mini mapper for forumal placeholder to the unit stats variable
     * (e.g SPD to speed)
     *
     * @param string $placeholder
     *
     * @return string|null
     */
    protected function placeholderToUnitStat(string $placeholder): ?string
    {
        // {"health":509,"attack":307,"defence":517,"speed":111,"resist":15,"critical_rate":15,"critical_damage":50}
        $map = [
            'CON' => 'health',
            'ATK' => 'attack',
            'SPD' => 'speed'
        ];

        return $map[$placeholder] ?: null;
    }
}
