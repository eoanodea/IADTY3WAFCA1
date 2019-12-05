<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visit = Visit::findOrFail($id);

        return view('patient.visits.show')->with([
            'visit' => $visit
        ]);
    }

    /**
     * Cancel the Visit
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id) {

        $visit = Visit::findOrFail($id);
        $visit->cancelled = true;
        $visit->save();
        
        return redirect()->route('patient.visits.show', $visit->id);
    }
}
