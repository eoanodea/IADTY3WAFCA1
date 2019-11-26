<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function visit() {
        return $this->hasMany('App\Visit');
    }
}
