<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class upholstery extends Model
{
    protected $fillable = ['name'];
    protected $table = 'upholsteries';
    
    public $incrementing = false;

    public function vehicles()
    {
        return $this->hasMany('App\vehicle');
    }
}
