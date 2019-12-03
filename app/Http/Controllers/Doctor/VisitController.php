<?php

namespace App\Http\Controllers\Doctor;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Users who are authorized and are doctors
     */
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
        $visits = Visit::all();
        return view('doctor.visits.index')->with([
            'visits' => $visits
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visit = Visit::findOrFail($id);

        return view('doctor.visits.show')->with([
            'visit' => $visit
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($patientId)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();

        if($patientId) return view('doctor.visits.create')->with([
            'doctors' => $doctors,
            'patients' => $patients,
            'patientId' => $patientId
        ]);
        return view('doctor.visits.create')->with([
            'doctors' => $doctors,
            'patients' => $patients,
        ]);
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
            'duration' => 'required|integer',
            'notes' => 'required|string',
            'doctor_id' => 'required|integer',
            'patient_id' => 'required|integer'
        ]);

        $visit = new Visit();
        $visit->duration = $request->input('duration');
        $visit->notes = $request->input('notes');
        $visit->doctor_id = $request->input('doctor_id');
        $visit->patient_id = $request->input('patient_id');
        
        $visit->save();

        return view('doctor.visits.show')->with([
            'visit' => $visit
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
        $visit = Visit::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();

        return view('doctor.visits.edit')->with([
            'visit' => $visit,
            'doctors' => $doctors,
            'patients' => $patients
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
        $visit = Visit::findOrFail($id);

        $request->validate([
            'duration' => 'required|integer',
            'notes' => 'required|string',
            'doctor_id' => 'required|integer',
            'patient_id' => 'required|integer'
        ]);

        $visit->duration = $request->input('duration');
        $visit->notes = $request->input('notes');
        $visit->doctor_id = $request->input('doctor_id');
        $visit->patient_id = $request->input('patient_id');
        
        $visit->save();

        return view('doctor.visits.show')->with([
            'visit' => $visit
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
        $visit = Visit::findOrFail($id);
        $visit->delete();

        return redirect()->route('doctor.visits.index');
    }
}
