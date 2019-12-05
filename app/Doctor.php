<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Doctor Model
    |--------------------------------------------------------------------------
    |
    | This model is responsible for handling the doctor model.
    | A doctor belongs to a user and has many visits
    */
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function visit() {
        return $this->hasMany('App\Visit');
    }
}
