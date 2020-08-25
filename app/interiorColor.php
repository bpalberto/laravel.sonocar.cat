<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class interiorColor extends Model
{
    protected $fillable = ['name'];
    
    
    //protected $table = 'interiorColors';
    
    public function vehicles()
    {
        return $this->hasMany('App\vehicle');
    }
}

