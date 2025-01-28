<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->text('description')->nullable();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->index('user_id');
            $table->string('repository_url')->nullable();
            $table->enum('status', ['active', 'archived', 'pending'])
                ->default('active')
                ->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
