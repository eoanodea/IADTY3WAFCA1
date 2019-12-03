<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\User;
use App\Visit;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:patient');
    }
    
    public function index() {
        return view('patient.patients.home');
    }

    public function show($id) {
        $user = User::findOrFail($id);
        $visits = Visit::orderBy('date', 'DESC')->get();
        $returnedVisits = array();

        foreach($visits as $visit) {
            if($user->patient->id == $visit->patient_id) {
                array_push($returnedVisits, $visit);
            }
        }

        return view('patient.patients.show')->with([
            'user' => $user,
            'visits' => $returnedVisits
        ]);
    }
}
