<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\User;
use App\Visit;
use Auth;

class PatientController extends Controller
{
    /**
     * Only authenticated users with the patient role
     * can use this controller
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:patient');
    }

    /**
     * Return the patient home page
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('patient.patients.home');
    }

    /**
     * Display the specified patient by their authentication ID
     * along with visits associated with this patient
     *
     * @return \Illuminate\Http\Response
     */
    public function show() {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
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
