<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'user_id' => User::factory(),
            'repository_url' => $this->faker->url(),
            'status' => $this->faker->randomElement(['active', 'archived', 'pending'])
        ];
    }
}
