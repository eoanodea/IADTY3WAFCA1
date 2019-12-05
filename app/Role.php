<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Role Model
    |--------------------------------------------------------------------------
    |
    | This model is responsible for handling user roles on the system. 
    | The user's role defines what the user can see, 
    | and how much access they have.
    */
    public function users() {
        return $this->belongsToMany('App\User', 'user_role');
    }
}
