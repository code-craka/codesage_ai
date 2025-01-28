<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\CodeReview;
use App\Models\ReviewComment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 users
        User::factory(10)->create()->each(function ($user) {
            // Create 2-5 projects for each user
            $projects = Project::factory(random_int(2, 5))->create([
                'user_id' => $user->id
            ]);

            // Create code reviews for each project
            $projects->each(function ($project) use ($user) {
                CodeReview::factory(random_int(3, 8))->create([
                    'project_id' => $project->id,
                    'user_id' => $user->id
                ])->each(function ($codeReview) use ($user) {
                    // Create 1-5 comments for each code review
                    ReviewComment::factory(random_int(1, 5))->create([
                        'code_review_id' => $codeReview->id,
                        'user_id' => $user->id
                    ]);
                });
            });
        });
    }
}
