<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function positions(Type $var = null)
    {
        return $this->belongsToMany(Position::class);
    }
}
