<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * Any authenticated user may access this controller
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Redirect the user to the correct homepage
     * depending on the users role
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $home = 'home';

        if ($user->hasRole('admin')) {
            $home = 'admin.index';
        } else if($user->hasRole('doctor')) {
            $home = 'doctor.doctors.index';
        } else $home = 'patient.patients.index';

        return redirect()->route($home);    
    }
}
