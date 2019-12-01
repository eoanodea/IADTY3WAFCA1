@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                        <div class="card-header">
                            Edit visit
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
                            <form method="POST" action="{{ route('admin.visits.update', $visit->id) }}">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $visit->first_name) }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $visit->last_name) }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $visit->email) }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="mobile_number">Mobile</label>
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number', $visit->mobile_number) }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $visit->address) }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="date_started">Date Started</label>
                                    <input type="date" class="form-control" id="date_started" name="date_started" value="{{ old('date_started', $visit->visit->date_started) }}"/>
                                </div>
                                <a href="{{ route('admin.visits.index') }}" class="btn btn-link">Cancel</a>
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection