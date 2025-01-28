<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CodeReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id',
        'commit_hash',
        'file_path',
        'code_snippet',
        'ai_analysis',
        'status',
    ];

    protected $casts = [
        'ai_analysis' => 'array',
        'status' => 'string',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(ReviewComment::class);
    }
}
