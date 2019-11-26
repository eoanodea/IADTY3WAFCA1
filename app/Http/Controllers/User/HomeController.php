<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:user');
    }
    
    public function index() {
        return view('user.patients.home');
    }

    public function show($id) {
        $user = User::findOrFail($id);

        return view('user.patients.show')->with([
            'user' => $user
        ]);
    }
}
