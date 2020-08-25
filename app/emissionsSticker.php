<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emissionsSticker extends Model
{
    protected $fillable = ['name'];
    
    
    //protected $table = 'emissionsStickers';


    public function vehicles()
    {
        return $this->hasMany('App\vehicle');
    }
}

