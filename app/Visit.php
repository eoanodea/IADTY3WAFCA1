<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    public function patient() {
        return $this->hasOne('App\Patient');
    }
    public function doctor() {
        return $this->hasOne('App\Doctor');
    }
}
