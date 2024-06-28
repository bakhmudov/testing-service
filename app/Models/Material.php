<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'topic_id'];

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
}
