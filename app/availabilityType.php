<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availabilityType extends Model
{
    protected $fillable = ['name'];
    
    //protected $table = 'availabilityType';


    public function vehicles()
    {
        return $this->hasMany('App\vehicle');
    }
}

