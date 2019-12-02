<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\User;
use App\Visit;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:doctor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doctor.doctors.home');
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

        return view('doctor.doctors.show')->with([
            'user' => $user,
            'visits' => $returnedVisits
        ]);
    }

}
