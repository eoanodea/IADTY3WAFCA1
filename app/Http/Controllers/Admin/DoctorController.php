<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
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
            if($user->doctor) {
                array_push($returnedUsers, $user);
            }
        }

        return view('admin.doctors.index')->with([
            'users' => $returnedUsers
        ]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:191|string',
            'last_name' => 'required|max:191|string',
            'email' => 'required|email|unique:users|max:191',
            'password' => 'required|min:8',
            'address' => 'required|max:255|string',
            'mobile_number' => 'required|max:191|string',
            'date_started' => 'required|date'
        ]);

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->mobile_number = $request->input('mobile_number');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $user->roles()->attach(Role::where('name', 'doctor')->first());

        $doctor = new Doctor();
        $doctor->date_started = $request->input('date_started');
        $doctor->user_id = $user->id;

        $doctor->save();

        return redirect()->route('admin.doctors.show', $user->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $visits = Visit::all();
        $returnedVisits = array();

        foreach($visits as $visit) {
            if($user->doctor->id == $visit->doctor_id) {
                array_push($returnedVisits, $visit);
            }
        }

        return view('admin.doctors.show')->with([
            'user' => $user,
            'visits' => $returnedVisits
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.doctors.edit')->with([
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'required|email|unique:users,email,'.$id.'|max:191',
            'password' => 'min:8',
            'address' => 'required|max:255|string',
            'mobile_number' => 'required|max:191|string',
            'date_started' => 'required|date'
        ]);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->mobile_number = $request->input('mobile_number');
        $user->address = $request->input('address');
        $user->doctor->date_started = $request->input('date_started');

        $user->save();
        $user->doctor->save();


        return redirect()->route('admin.doctors.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.doctors.index');
    }
}
