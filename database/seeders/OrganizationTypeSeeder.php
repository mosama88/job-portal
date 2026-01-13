<?php

namespace Database\Seeders;

use App\Models\OrganizationType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganizationTypeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizationType = [
            ['name' => 'Government', 'slug' => 'government'],
            ['name' => 'Semi Government', 'slug' => 'semi-government'],
            ['name' => 'Public', 'slug' => 'public'],
            ['name' => 'Private', 'slug' => 'private'],
            ['name' => 'NGO', 'slug' => 'ngo'],
            ['name' => 'International Agencies', 'slug' => 'international-agencies'],
        ];

        OrganizationType::insert($organizationType);
    }
}