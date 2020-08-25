<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fuelType extends Model
{
    protected $fillable = ['name'];
    
    //protected $table = 'fuelTypes';
    
    public function vehicles()
    {
        return $this->hasMany('App\vehicle');
    }
}

