<?php

namespace Database\Seeders;

use App\Models\IndustryType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndustryTypeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industryType = [
            ['name' => 'Manufacturing', 'slug' => 'manufacturing'],
            ['name' => 'Technology', 'slug' => 'technology'],
            ['name' => 'Healthcare', 'slug' => 'healthcare'],
            ['name' => 'Financial Services', 'slug' => 'financial-services'],
            ['name' => 'Energy', 'slug' => 'Energy'],
            ['name' => 'Telecommunications', 'slug' => 'telecommunications'],
            ['name' => 'Retail', 'slug' => 'retail'],
            ['name' => 'Agriculture', 'slug' => 'agriculture'],
            ['name' => 'Transportation and Logistics', 'slug' => 'transportation-logistics'],
            ['name' => 'Entertainment and Media', 'slug' => 'entertainment-media'],
            ['name' => 'Construction', 'slug' => 'construction'],
            ['name' => 'Automotive', 'slug' => 'automotive'],
            ['name' => 'Tourism and Hospitality', 'slug' => 'tourism-hospitality'],
            ['name' => 'Education', 'slug' => 'education'],
            ['name' => 'Real Estate', 'slug' => 'Rreal-estate'],
            ['name' => 'Pharmaceutical', 'slug' => 'pharmaceutical'],
            ['name' => 'Consumer Goods', 'slug' => 'consumer-goods'],
            ['name' => 'Environmental', 'slug' => 'environmental'],
            ['name' => 'Defense and Aerospace', 'slug' => 'defense-aerospace'],
            ['name' => 'Legal and Professional Services', 'slug' => 'legal-professional-services'],
        ];

        IndustryType::insert($industryType);
    }
}