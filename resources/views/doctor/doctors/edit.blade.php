{{--
 * --------------------
 * Author Name: Eoan O'Dea
 * Author Email: eoan@wspace.ie
 * Date Created: Tuesday December 3rd 2019 2:11:17 pm
 * --------------------
 * Project Name: WAFCA1MedicalCentre
 * Version: 1.0.0
 * --------------------
 * File Name: edit.blade.php
 * Last Modified: Tuesday December 3rd 2019 2:21:33 pm
 * --------------------
 * Copyright (c) 2019 WebSpace
 * --------------------
--}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                        <div class="card-header">
                            Edit user
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}<li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('doctor.doctors.update', $user->id) }}">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="mobile_number">Mobile</label>
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number', $user->mobile_number) }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="date_started">Date Started</label>
                                    <input type="date" class="form-control" id="date_started" name="date_started" value="{{ old('date_started', $user->doctor->date_started) }}"/>
                                </div>
                                <a href="{{ route('doctor.doctors.show', $user->id) }}" class="btn btn-link">Cancel</a>
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection


