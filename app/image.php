<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $fillable = [
        'url',
        'fileName',
        'vehicle_id',
        ];
    
    public $timestamps = false;
    
    public function vehicles()
    {
        return $this->belongsTo('App\vehicle', 'vehicle_id');
    }   
}