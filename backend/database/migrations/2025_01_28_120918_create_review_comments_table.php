<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('review_comments', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('code_review_id')
                ->constrained()
                ->onDelete('cascade');
            $table->index('code_review_id');
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->index('user_id');
            $table->text('comment');
            $table->json('metadata')->nullable();
            $table->timestamps();

            // Composite index for common queries
            $table->index(['code_review_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('review_comments');
    }
};
