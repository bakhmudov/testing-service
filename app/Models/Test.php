<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = ['discipline_id', 'title', 'description', 'total_time', 'enrolled_students'];

    public function discipline()
    {
        return $this->belongsTo(Discipline::class, 'discipline_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
