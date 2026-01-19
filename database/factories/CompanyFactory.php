<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use App\Models\TeamSize;
use Illuminate\Support\Str;
use App\Models\IndustryType;
use App\Models\OrganizationType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        $companyName = $this->faker->company();

        return [
            'user_id' => User::factory()->create(['role' => 'company']),
            'name' => $companyName,
            'slug' => Str::slug($companyName),
            'industry_type_id' => IndustryType::inRandomOrder()->first()->id ?? IndustryType::factory()->create()->id,
            'organization_type_id' => OrganizationType::inRandomOrder()->first()->id ?? OrganizationType::factory()->create()->id,
            'team_size_id' => TeamSize::inRandomOrder()->first()->id ?? TeamSize::factory()->create()->id,
            'establishemnt_date' => $this->faker->dateTimeBetween('-30 years', 'now')->format('Y-m-d'),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->companyEmail(),
            'website' => $this->faker->url(),
            'bio' => $this->faker->paragraphs(3, true),
            'vision' => $this->faker->paragraphs(2, true),
            'total_views' => $this->faker->numberBetween(0, 10000),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),
            'map_link' => $this->faker->url() . '/map',
            'is_profile_verified' => $this->faker->boolean(70), // 70% chance of being verified
            'document_verified_at' => $this->faker->optional(0.7)->dateTimeBetween('-1 year', 'now'), // 70% chance
            'profile_completion' => $this->faker->numberBetween(30, 100),
            'visibility' => $this->faker->boolean(80), // 80% chance of being visible
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Company $company) {
            // Additional setup after company creation if needed
        });
    }

    // State Methods for specific scenarios
    public function verified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'is_profile_verified' => true,
                'document_verified_at' => now(),
            ];
        });
    }

    public function unverified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'is_profile_verified' => false,
                'document_verified_at' => null,
            ];
        });
    }

    public function visible(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'visibility' => true,
            ];
        });
    }

    public function hidden(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'visibility' => false,
            ];
        });
    }

    public function withFullProfile(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'profile_completion' => 100,
                'bio' => $this->faker->paragraphs(5, true),
                'vision' => $this->faker->paragraphs(4, true),
            ];
        });
    }

    public function withHighViews(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'total_views' => $this->faker->numberBetween(5000, 50000),
            ];
        });
    }

    public function recent(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'establishemnt_date' => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            ];
        });
    }

    public function established(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'establishemnt_date' => $this->faker->dateTimeBetween('-30 years', '-10 years')->format('Y-m-d'),
            ];
        });
    }
}