<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Visit Model
    |--------------------------------------------------------------------------
    |
    | This model is responsible for handling visits on the system. 
    | A Visit must have one Patient and one Doctor
    */
    public function patient() {
        return $this->belongsTo('App\Patient');
    }
    public function doctor() {
        return $this->belongsTo('App\Doctor');
    }
}
