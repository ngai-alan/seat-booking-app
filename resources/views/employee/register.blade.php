@extends('layouts.app')


@section('content')
<div class="container col-6 col-offset-3 main-container">

    <h2>Employee Registration</h2>
    <form method="POST" action="{{ url('employee/register') }}">
        @csrf
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" placeholder="Enter Firstname" id="firstName" name="firstName"
                value="{{ old('firstName') }}" />
            @error('firstName')
            <p class="error"> {{ $message }} </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" placeholder="Enter Lastname" id="lastName" name="lastName"
                value="" />
            @error('lastName')
            <p class="error"> {{ $message }} </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="payrollNumber">Payroll Number:</label>
            <input type="text" class="form-control" placeholder="Enter Payroll Number" id="payrollNumber"
                name="payrollNumber" value="{{ old('payrollNumber') }}" required />
            @error('payrollNumber')
            <p class="error"> {{ $message }} </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
                value="{{ old('email') }}" required />
            @error('email')
            <p class="error"> {{ $email }} </p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection