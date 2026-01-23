<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'id' => 1,
                'label' => 'Go',
                'price' => 220,
                'job_limit' => 1,
                'featured_job_limit' => 1,
                'highlight_job_limit' => 1,
                'profile_verified' => 1,
                'recommended' => 0,
                'frontend_show' => 1,
                'show_home' => 1,
                'created_at' => '2026-01-23 09:47:22',
                'updated_at' => '2026-01-23 09:47:22',
            ],
            [
                'id' => 2,
                'label' => 'Plus',
                'price' => 999.99,
                'job_limit' => 3,
                'featured_job_limit' => 3,
                'highlight_job_limit' => 3,
                'profile_verified' => 0,
                'recommended' => 1,
                'frontend_show' => 1,
                'show_home' => 1,
                'created_at' => '2026-01-23 09:47:43',
                'updated_at' => '2026-01-23 09:47:43',
            ],
            [
                'id' => 3,
                'label' => 'Pro',
                'price' => 9999,
                'job_limit' => 8,
                'featured_job_limit' => 8,
                'highlight_job_limit' => 8,
                'profile_verified' => 1,
                'recommended' => 0,
                'frontend_show' => 1,
                'show_home' => 1,
                'created_at' => '2026-01-23 09:48:17',
                'updated_at' => '2026-01-23 09:48:25',
            ],
        ];

        foreach ($plans as $plan) {
            Plan::updateOrCreate(
                ['id' => $plan['id']],
                $plan
            );
        }
    }
}
