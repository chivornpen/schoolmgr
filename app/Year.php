<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
