<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'test_id', 'completion_time', 'correct_answers', 'total_points'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }
}
