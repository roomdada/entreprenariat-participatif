<?php

namespace Database\Factories;

use App\Models\Domaine;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'identifier' => 'PJT-'.Str::random(5),
            'title' => fake()->sentence(),
            'description' => fake()->sentence(),
            'user_id' => User::all()->random()->id,
            'domaine_id' => Domaine::all()->random()->id,
            'amount' => rand(10000, 10000),
        ];
    }
}
