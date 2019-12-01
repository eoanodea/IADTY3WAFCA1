@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                        Visits
                    <a href="{{ route('admin.visits.create') }}" class="btn btn-primary float-right">Add</a>
                    </div>
                    <div class="card-body">
                        @if (count($visits) === 0)
                            <p>No visits available</p>
                        @else
                            <table id="table-visits" class="table table-hover">
                                <thead>
                                    <th>Doctor</th>
                                    <th>Patient</th>
                                    <th>Duration</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($visits as $visit)
                                        <tr data-id="{{ $visit->id }}">
                                            <td>{{ $visit->doctor->user->first_name }} {{ $visit->doctor->user->last_name }} </td>
                                            <td>{{ $visit->patient->user->first_name }} {{ $visit->patient->user->last_name }} </td>
                                            <td>{{ $visit->duration}}</td>
                                            <td>
                                                <a href="{{ route('admin.visits.show', $visit->id) }}" class="btn btn-default">View</a>
                                                <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                                            <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="form-control btn btn-danger">Delete</button>
                                            </form>
                                            </td>
                                        
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