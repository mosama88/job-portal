<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Candidate;
use App\Models\Language;

class CandidateLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $candidates = Candidate::all();
        $skills = Language::all()->pluck('id');

        foreach ($candidates as $candidate) {
            $candidate->languages()->syncWithoutDetaching(
                $skills->random(rand(1, 45))->toArray()
            );
        }
    }
}