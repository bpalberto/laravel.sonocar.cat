<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class make extends Model
{
    protected $fillable = ['name'];
    
    public function vehicles()
    {
        return $this->hasMany('App\vehicle');
    }
    
}

