@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                    <div class="card-header">
                        Visit
                    </div>
                    <div class="card-body">
                        
                            <table id="table-visits" class="table table-hover">
                                <tbody>
                                        <tr>
                                            <td>Date</td>
                                            <td>{{ $visit->date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Time</td>
                                            <td>{{ $visit->time }}</td>
                                        </tr>
                                        <tr>
                                            <td>Patient</td>
                                            <td>{{ $visit->patient->user->first_name }} {{ $visit->patient->user->last_name }} </a></td>
                                        </tr>
                                        <tr>
                                            <td>Doctor</td>
                                            <td>Dr. {{ $visit->doctor->user->first_name }} {{ $visit->doctor->user->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Duration</td>
                                            <td>{{ $visit->duration}} minutes</td>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td>{{ $visit->created_at }}</td>
                                        </tr>
                                    </tbody>
                            </table>
                            <a href="{{ route('patient.patients.show', $visit->patient->user->id) }}" class="btn btn-default">Back</a>
                        
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection