<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipment extends Model
{
    protected $fillable = ['name'];
    
    
    public function vehicles()
    {
        return $this->belongsToMany('App\vehicle');
    }
    
    
}



