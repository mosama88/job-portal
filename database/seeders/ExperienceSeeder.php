<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $languages = [
            'name' => 'Fresher',
            'name' => '1 Year',
            'name' => '2 Year',
            'name' => '3+ Year',
            'name' => '5+ Year',
            'name' => '8+ Year',
            'name' => '10+ Year',
            'name' => '15+ Year',
            'name' => '20+ Year',
        ];

        Experience::insert($languages);
    }
}