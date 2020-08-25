<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class makeModel extends Model
{
    protected $fillable = ['name', 'make_id'];
    
    protected $table = 'models';
    
    public function vehicles()
    {
        return $this->hasMany('App\vehicle');
    }
}

