<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Return the admin home page
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.home');
    }
}
