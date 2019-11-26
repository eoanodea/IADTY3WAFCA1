@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                    <div class="card-header">
                        Patient: {{ $user->first_name }} {{ $user->last_name }}
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
                                            <td>You have no insurance details on file</td>
                                        </tr>
                                    @endif
                                    </tbody>
                            </table>
                            <a href="{{ route('patient.home') }}" class="btn btn-secondary">Back</a>
                        
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection