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
                                            <td>Patient</td>
                                            <td><a href="{{ route('doctor.patients.show', $visit->patient->user->id) }}">{{ $visit->patient->user->first_name }} {{ $visit->patient->user->last_name }} </a></td>
                                        </tr>
                                        <tr>
                                            <td>Doctor</td>
                                            <td><a href="{{ route('doctor.doctors.show', $visit->doctor->user->id) }}">{{ $visit->doctor->user->first_name }} {{ $visit->doctor->user->last_name }} </a></td>
                                        </tr>
                                        <tr>
                                            <td>Duration</td>
                                            <td>{{ $visit->duration}} minutes</td>
                                        </tr>
                                        <tr>
                                            <td>Notes</td>
                                            <td>{{ $visit->notes }}</td>
                                        </tr>
                                    </tbody>
                            </table>
                            <a href="{{ route('doctor.visits.index', $visit->id) }}" class="btn btn-default">Back</a>
                            <a href="{{ route('doctor.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                            <form style="display:inline-block" method="POST" action="{{ route('doctor.visits.destroy', $visit->id) }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="form-control btn btn-danger">Delete</button>
                            </form>
                        
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection