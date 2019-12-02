<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
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

        return view('admin.visits.show')->with([
            'visit' => $visit
        ]);
    }
}
