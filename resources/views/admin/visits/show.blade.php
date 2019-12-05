@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                    <div class="card-header">
                        Visit @if($visit->cancelled) <span class="badge badge-danger float-right" style="padding: 10px;margin: 0 5px">CANCELLED</span> @endif
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
                                            <td><a href="{{ route('admin.patients.show', $visit->patient->user->id) }}">{{ $visit->patient->user->first_name }} {{ $visit->patient->user->last_name }} </a></td>
                                        </tr>
                                        <tr>
                                            <td>Doctor</td>
                                            <td><a href="{{ route('admin.doctors.show', $visit->doctor->user->id) }}">{{ $visit->doctor->user->first_name }} {{ $visit->doctor->user->last_name }} </a></td>
                                        </tr>
                                        <tr>
                                            <td>Duration</td>
                                            <td>{{ $visit->duration}} minutes</td>
                                        </tr>
                                        <tr>
                                            <td>Cost</td>
                                            <td>€{{ $visit->cost}}</td>
                                        </tr>
                                        <tr>
                                            <td>Notes</td>
                                            <td>{{ $visit->notes }}</td>
                                        </tr>
                                    </tbody>
                            </table>
                            <a href="{{ route('admin.visits.index', $visit->id) }}" class="btn btn-default">Back</a>
                            
                            <form style="display:inline-block;float: right;margin: 0 5px;" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="form-control btn btn-danger float-right">Delete</button>
                            </form>

                            <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning float-right">Edit</a>

                            @if(!$visit->cancelled && $visit->date > date('Y-m-d')) <a href="{{ route('admin.visits.cancel', $visit->id) }}" class="btn btn-danger float-right" style="margin: 0 5px">Cancel Visit</a> @endif
                        
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection