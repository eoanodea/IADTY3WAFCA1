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
                                            <td><a href="{{ route('admin.patients.show', $visit->patient->id) }}">{{ $visit->patient->user->first_name }} {{ $visit->patient->user->last_name }} </a></td>
                                        </tr>
                                        <tr>
                                            <td>Doctor</td>
                                            <td><a href="{{ route('admin.doctors.show', $visit->doctor->id) }}">{{ $visit->doctor->user->first_name }} {{ $visit->doctor->user->last_name }} </a></td>
                                        </tr>
                                        <tr>
                                            <td>Duration</td>
                                            <td>{{ $visit->duration}}</td>
                                        </tr>
                                        <tr>
                                            <td>Notes</td>
                                            <td>{{ $visit->notes }}</td>
                                        </tr>
                                    </tbody>
                            </table>
                            <a href="{{ route('admin.visits.index', $visit->id) }}" class="btn btn-default">Back</a>
                            <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                            <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="token" value="{{ csrf_token() }}">
                                <button type="submit" class="form-control btn btn-danger">Delete</button>
                            </form>
                        
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection