<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function generation()
    {
        return $this->belongsTo(Generation::class);
    }
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class);
    }
}
