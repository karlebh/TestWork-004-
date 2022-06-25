<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::first();
        $name = $this->faker->name();
        $slug = Str::limit(Str::lower(Str::slug($name)), 50, '');

        return [
            'user_id' => $user->id,
            'name' => $name,
            'slug' => $slug,
            'address' => $this->faker->address(),
            'owner' => $this->faker->name(),
            'employee_count' => random_int(100, 300),
            'worth' => random_int(1000_000_000, 300_000_000_000_000),
            'founded_at' => $this->faker->dateTime(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
