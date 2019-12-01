<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Patient;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
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
            if($user->patient) {
                array_push($returnedUsers, $user);
            }
        }

        return view('admin.patients.index')->with([
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
        return view('admin.patients.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::findOrFail($id);
        
        return view('admin.patients.show')->with([
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'required|email|unique:users|max:191',
            'password' => 'required|min:8',
            'mobile_number' => 'required',
            'address' => 'required',
            'insurance_company' => 'string|max:191|nullable',
            'policy_number' => 'string|max:191|nullable'
        ]);

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->mobile_number = $request->input('mobile_number');
        $user->address = $request->input('address');
        $user->save();

        $user->roles()->attach(Role::where('name', 'patient')->first());

        $patient = new Patient();
        if($request->input('has_insurance')) {
            $patient->has_insurance = true;
            $patient->insurance_company = $request->input('insurance_company');
            $patient->policy_number = $request->input('policy_number');
        } else $patient->has_insurance = false;
        
        $patient->user_id = $user->id;
        $patient->save();
        
        return view('admin.patients.show')->with([
            'user' => $user
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

        return view('admin.patients.edit')->with([
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
            'mobile_number' => 'required',
            'address' => 'required',
            'insurance_company' => 'string|max:191|nullable',
            'policy_number' => 'string|max:191|nullable'
        ]);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->mobile_number = $request->input('mobile_number');
        $user->address = $request->input('address');
        
        if($request->input('insurance_company') !== null) {
            $user->patient->has_insurance = true;
            $user->patient->insurance_company = $request->input('insurance_company');
            $user->patient->policy_number = $request->input('policy_number');
        } else {
            $user->patient->has_insurance = false;
            $user->patient->insurance_company = null;
            $user->patient->policy_number = null;
        }
        
        $user->save();
        $user->patient->save();

        return view('admin.patients.show')->with([
            'user' => $user
        ]);
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

        return redirect()->route('admin.patients.index');
    }

}