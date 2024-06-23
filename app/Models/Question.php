<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['test_id', 'content', 'question_type', 'answers', 'correct_answers', 'explanation', 'points'];

    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }
}
