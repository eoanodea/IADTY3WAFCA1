<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Patient Model
    |--------------------------------------------------------------------------
    |
    | This model is responsible for handling the patient model.
    | A patient belongs to a user and has many visits.
    */
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function visit() {
        return $this->hasMany('App\Visit');
    }
}
