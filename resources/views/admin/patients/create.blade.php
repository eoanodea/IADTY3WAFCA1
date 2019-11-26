@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                        <div class="card-header">
                            Add a new Patient
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
                            <form method="POST" action="{{ route('admin.patients.store') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="mobile_number">Mobile</label>
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="has_insurance">Patient Has Insurance?</label>
                                    <input type="checkbox" class="form-control" id="has_insurance" name="has_insurance" value="{{ old('has_insurance') }}"/>
                                </div>
                                <div id="insurance_details" class="hide fade">
                                    <div class="form-group">
                                        <label for="insurance_company">Insurance Company</label>
                                        <input type="text" class="form-control" id="insurance_company" name="insurance_company" value="{{ old('insurance_company') }}"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="policy_number">Insurance Policy Number</label>
                                        <input type="text" class="form-control" id="policy_number" name="policy_number" value="{{ old('policy_number') }}"/>
                                    </div>
                                </div>
                                <a href="{{ route('admin.patients.index') }}" class="btn btn-link">Cancel</a>
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <script>
            const checkBox = document.getElementById('has_insurance')
            const insuranceDiv = document.getElementById('insurance_details')

            checkBox.addEventListener('change', function() {
                if(this.checked) {
                    insuranceDiv.className = "fade-in"
                    this.value = true
                } else {
                    insuranceDiv.className = "fade"
                    this.value = false
                }
            });
        </script>
    </div>
@endsection