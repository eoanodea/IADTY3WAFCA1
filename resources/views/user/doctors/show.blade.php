@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                    <div class="card-header">
                        Doctor: {{ $user->first_name }} {{ $user->last_name }}
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
                            <a href="{{ route('doctor.home') }}" class="btn btn-secondary">Back</a>
                        
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection