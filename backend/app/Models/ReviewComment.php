<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReviewComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_review_id',
        'user_id',
        'comment',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    public function codeReview(): BelongsTo
    {
        return $this->belongsTo(CodeReview::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
