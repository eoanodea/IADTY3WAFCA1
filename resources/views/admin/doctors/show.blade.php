@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                    <div class="card-header">
                        {{ $user->doctor ? 'Doctor - ' : ''}}{{ $user->first_name }} {{ $user->last_name }} @if(Auth::user()->id == $user->id) (You) @endif
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
                                        @if ($user->doctor)
                                        <tr>
                                            <td>Date Started</td>
                                            <td>{{ $user->doctor->date_started }}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                            </table>
                            <a href="{{ route('admin.doctors.index', $user->id) }}" class="btn btn-default">Back</a>
                            <a href="{{ route('admin.doctors.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                            <form style="display:inline-block" method="POST" action="{{ route('admin.doctors.destroy', $user->id) }}">
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