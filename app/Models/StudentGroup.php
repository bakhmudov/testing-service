<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    use HasFactory;

    protected $fillable = ['group_number', 'leader'];

    public function students()
    {
        return $this->hasMany(Student::class, 'group_id');
    }
}
