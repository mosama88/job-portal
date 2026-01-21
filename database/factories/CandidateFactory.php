<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Candidate;
use App\Models\Experience;
use App\Models\Profession;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CandidateFactory extends Factory
{
    protected $model = Candidate::class;

    public function definition(): array
    {
        $name = $this->faker->name();

        return [
            'user_id' => User::inRandomOrder()->value('id')
                ?? User::factory(),
            'full_name' => $name,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'slug' => Str::slug($name),

            'experience_id' => Experience::inRandomOrder()->value('id')
                ?? Experience::factory(),

            'profession_id' => Profession::inRandomOrder()->value('id')
                ?? Profession::factory(),

            'website' => $this->faker->url(),
            'title' => $this->faker->jobTitle(),
            'bio' => $this->faker->paragraphs(3, true),

            'phone_one' => $this->faker->phoneNumber(),
            'phone_two' => $this->faker->phoneNumber(),

            'marital_status' => $this->faker->randomElement(['married', 'single']),
            'birth_date' => $this->faker->date('Y-m-d'),

            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),

            'availability' => true,
        ];
    }
}