<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bodyColor extends Model
{
    protected $fillable = ['name'];
    
    
    
    public function vehicles()
    {
        return $this->hasMany('App\vehicle');
    }
}

