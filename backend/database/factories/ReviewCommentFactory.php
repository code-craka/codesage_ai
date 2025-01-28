<?php

namespace Database\Factories;

use App\Models\ReviewComment;
use App\Models\CodeReview;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ReviewComment>
 */
class ReviewCommentFactory extends Factory
{
    protected $model = ReviewComment::class;

    public function definition(): array
    {
        return [
            'code_review_id' => CodeReview::factory(),
            'user_id' => User::factory(),
            'comment' => $this->faker->paragraph(),
            'metadata' => [
                'line_number' => $this->faker->numberBetween(1, 1000),
                'suggestion_type' => $this->faker->randomElement(['improvement', 'bug', 'security', 'performance'])
            ]
        ];
    }
}
