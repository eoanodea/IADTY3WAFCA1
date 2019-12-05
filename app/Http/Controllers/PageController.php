<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Controller for unauthenticated user pages
 */
class PageController extends Controller
{
    public function welcome() {
        return view('welcome');
    }
    public function about() {
        return view('about');
    }
}
