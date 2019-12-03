@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                    <div class="card-header">
                        Patient: {{ $user->first_name }} {{ $user->last_name }} @if(Auth::user()->id == $user->id) (You) @endif
                    </div>
                    <div class="card-body">
                        
                            <table id="table-users" class="table table-hover">
                                <tbody>
                                        <tr>
                                            <td>First Name</td>
                                            <td>{{ $user->first_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td>{{ $user->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mobile</td>
                                            <td>{{ $user->mobile_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{ $user->address }}</td>
                                        </tr>
                                        @if($user->patient && $user->patient->has_insurance)
                                        <tr>
                                            <td>Insurance Company</td>
                                            <td>{{ $user->patient->insurance_company }}</td>
                                        </tr>
                                        <tr>
                                            <td>Insurance Policy Number</td>
                                            <td>{{ $user->patient->policy_number }}</td>
                                        </tr>
                                        @else 
                                            <tr>
                                                <td>Insurance Details</td>
                                                <td>User has no insurance</td>
                                            </tr>
                                        @endif
                                    </tbody>
                            </table>
                            <a href="{{ route('doctor.patients.index', $user->id) }}" class="btn btn-default">Back</a>
                            <a href="{{ route('doctor.patients.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                            <form style="display:inline-block" method="POST" action="{{ route('doctor.patients.destroy', $user->id) }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="form-control btn btn-danger">Delete</button>
                            </form>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
                <div class="card">
                        <div class="card-header">
                            Visit Log
                            <a href={{ route('doctor.visits.create', $user->id) }} class="btn btn-primary float-right">Add Visit</a>
                        </div>
                        <div class="card-body">
                            @if (count($visits) === 0)
                                <p>No visits available</p>
                            @else
                            <table id="table-visits" class="table table-hover">
                                <thead>
                                    <th>Date</th>
                                    <th>Doctor</th>
                                    <th>Duration</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($visits as $visit)
                                            <tr data-id="{{ $visit->id }}">
                                                <td>{{ $visit->date }}@if($visit->cancelled) <span class="badge badge-danger" style="padding: 10px;margin: 0 5px">CANCELLED</span> @endif</td>
                                                <td><a href="{{ route('doctor.doctors.show', $visit->doctor->user->id) }}">{{ $visit->doctor->user->first_name }} {{ $visit->doctor->user->last_name }} @if(Auth::user()->id == $user->id) (You) @endif</a></td>
                                                <td>{{ $visit->duration}} minutes</td>
                                                <td><a href="{{ route('doctor.visits.show', $visit->id) }}" class="btn btn-primary">View</a></td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif                    
                        </div>
                </div>
            </div>
    </div>
</div>

@endsection