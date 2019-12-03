<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
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
        } else if($user->hasRole('patient')) {
            $home = 'patient.patients.index';
        }


        return redirect()->route($home);    
    }
}
