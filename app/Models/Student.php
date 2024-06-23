<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'name', 'email', 'password', 'phone', 'city'];

    public function group()
    {
        return $this->belongsTo(StudentGroup::class, 'group_id');
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
