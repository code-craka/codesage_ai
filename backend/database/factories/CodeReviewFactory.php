<?php

namespace Database\Factories;

use App\Models\CodeReview;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CodeReview>
 */
class CodeReviewFactory extends Factory
{
    protected $model = CodeReview::class;

    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'user_id' => User::factory(),
            'commit_hash' => $this->faker->sha1(),
            'file_path' => 'src/' . $this->faker->word() . '/' . $this->faker->word() . '.php',
            'code_snippet' => $this->faker->text(),
            'ai_analysis' => [
                'suggestions' => $this->faker->sentences(),
                'issues' => $this->faker->sentences(),
                'score' => $this->faker->numberBetween(1, 100)
            ],
            'status' => $this->faker->randomElement(['pending', 'completed', 'in_progress'])
        ];
    }
}
