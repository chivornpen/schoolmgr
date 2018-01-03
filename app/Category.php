<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table='categories';
    protected $fillable=['name','parent','is_active'];

    public function articles(){
        return $this->hasMany(Article::class);
    }
}
