<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            'Fresher',
            '1 Year',
            '2 Year',
            '3+ Year',
            '5+ Year',
            '8+ Year',
            '10+ Year',
            '15+ Year',
            '20+ Year',
        ];


        foreach ($experiences as $experience) {
            Experience::firstOrCreate([
                'name' => $experience,
            ]);
        }
    }
}
