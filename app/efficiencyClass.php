<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class efficiencyClass extends Model
{
    protected $fillable = ['name'];

    protected $table = 'efficiency_classes';

    public function vehicles()
    {
        return $this->hasMany('App\vehicle');
    }
}
