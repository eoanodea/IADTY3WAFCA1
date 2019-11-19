<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $returnedUsers = array();

        foreach($users as $user) {
            if(!$user->doctor) {
                array_push($returnedUsers, $user);
            }
        }

        return view('admin.users.index')->with([
            'users' => $returnedUsers
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::findOrFail($id);
        
        return view('admin.users.show')->with([
            'user' => $user
        ]);
    }

}
