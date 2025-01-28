<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('code_reviews', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')
                ->constrained()
                ->onDelete('cascade');
            $table->index('project_id');
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->index('user_id');
            $table->string('commit_hash')->nullable()->index();
            $table->string('file_path')->index();
            $table->text('code_snippet');
            $table->json('ai_analysis');
            $table->enum('status', ['pending', 'completed', 'in_progress'])
                ->default('pending')
                ->index();

            // Composite index for common queries
            $table->index(['project_id', 'status']);
            $table->index(['user_id', 'status']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('code_reviews');
    }
};
