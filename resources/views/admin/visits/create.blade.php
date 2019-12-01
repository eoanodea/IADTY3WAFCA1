@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                        <div class="card-header">
                            Add new visit
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}<li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('admin.visits.store') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="doctor">Doctor</label>
                                    <br />
                                    <select name="doctor_id">
                                        @foreach ($doctors as $doctor)
                                            <option 
                                                value={{ $doctor->id }} 
                                                {{ (old('doctor_id') == $doctor->id) 
                                                    ? "selected" 
                                                    : "" }}
                                            >{{ $doctor->user->first_name }} {{ $doctor->user->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="patient">Patient</label>
                                    <br />
                                    <select name="patient_id">
                                        @foreach ($patients as $patient)
                                            <option 
                                                value={{ $patient->id }} 
                                                {{ (old('patient_id') == $patient->id) 
                                                    ? "selected" 
                                                    : "" }}
                                            >{{ $patient->user->first_name }} {{ $patient->user->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="mobile_number">Mobile</label>
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="date_started">Date Started</label>
                                    <input type="date" class="form-control" id="date_started" name="date_started" value="{{ old('date_started') }}"/>
                                </div>
                                
                                <a href="{{ route('admin.visits.index') }}" class="btn btn-link">Cancel</a>
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection