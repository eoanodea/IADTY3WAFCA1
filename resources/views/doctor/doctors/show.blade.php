@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                    <div class="card-header">
                        Doctor: {{ $user->first_name }} {{ $user->last_name }}
                        <a href={{ route('doctor.doctors.edit', $user->id) }} class="btn btn-primary float-right">Edit</a>
                    </div>
                    <div class="card-body">
                            <table id="table-books" class="table table-hover">
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
                                    @if ($user->doctor)
                                    <tr>
                                        <td>Date Started</td>
                                        <td>{{ $user->doctor->date_started }}</td>
                                    </tr>
                                    @endif
                                    </tbody>
                            </table>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
                <div class="card">
                        <div class="card-header">
                            Visit Log
                            <a href={{ route('doctor.visits.create') }} class="btn btn-primary float-right">Add Visit</a>
                        </div>
                        <div class="card-body">
                            @if (count($visits) === 0)
                                <p>No visits available</p>
                            @else
                            <table id="table-visits" class="table table-hover">
                                <thead>
                                    <th>Date</th>
                                    <th>Patient</th>
                                    <th>Duration</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($visits as $visit)
                                            <tr data-id="{{ $visit->id }}">
                                                <td>{{ $visit->created_at }}</td>
                                                <td><a href="{{ route('doctor.patients.show', $visit->patient->user->id) }}">{{ $visit->patient->user->first_name }} {{ $visit->patient->user->last_name }} </a></td>
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