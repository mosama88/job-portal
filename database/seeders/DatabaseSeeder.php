<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            LanguageSeeder::class,
            CurrencySeeder::class,
            SkillSeeder::class,
            ExperienceSeeder::class,
            ProfessionSeeder::class,
            IndustryTypeSeeder::class,
            OrganizationTypeSeeder::class,
            TeamSizeSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            CompanySeeder::class,
            CandidateSeeder::class,
            CandidateLanguageSeeder::class,
            CandidateSkillSeeder::class,
            PlanSeeder::class,
        ]);
    }
}
