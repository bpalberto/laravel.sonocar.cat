<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fuelCategory extends Model
{
    protected $fillable = ['name'];
    
    
    
    public function vehicles()
    {
        return $this->hasMany('App\vehicle');
    }
}

