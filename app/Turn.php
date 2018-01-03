<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
