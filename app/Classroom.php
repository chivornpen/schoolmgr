<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function year(){
        return $this->belongsTo(Year::class);
    }
    public function turn()
    {
        return $this->belongsTo(Turn::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
