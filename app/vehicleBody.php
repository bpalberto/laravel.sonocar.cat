<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicleBody extends Model
{
    protected $fillable = ['name'];
    
    
    //protected $table = 'vehiclesBodys';
    
    public function vehicles()
    {
        return $this->hasMany('App\vehicle');
    }
}

