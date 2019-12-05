<?php
namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\User;
use App\Visit;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Only authenticated users with the doctor role
     * can use this controller
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
        return view('doctor.doctors.home');
    }

    /**
     * Display the specified doctor, 
     * along with visits associated with it
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $visits = Visit::orderBy('date', 'DESC')->get();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('doctor.doctors.edit')->with([
            'user' => $user
        ]);
    }

    /**
     * Validate and update the doctor in storage.
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


        return redirect()->route('doctor.doctors.show', $user->id);
    }


}
