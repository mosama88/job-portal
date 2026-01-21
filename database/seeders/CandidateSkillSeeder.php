<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\Candidate;
use Illuminate\Database\Seeder;
use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CandidateSkillSeeder extends Seeder
{
    public function run(): void
    {
        $candidates = Candidate::all();
        $skills = Skill::all()->pluck('id');

        foreach ($candidates as $candidate) {
            $candidate->skills()->syncWithoutDetaching(
                $skills->random(rand(1, 45))->toArray()
            );
        }
    }
}
