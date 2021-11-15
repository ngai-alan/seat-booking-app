@extends('layouts.app')


@section('content')
<div class="container col-6 col-offset-3 main-container">

    <h2>Select Employee & Office for Booking</h2>

    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ session('message') }}</strong>
    </div>
    @endif

    <form method="POST" action="{{ url('booking/select-timeslot') }}">
        @csrf
        <div class="form-group">
            <label for="employee_id">Select Employee:</label>
            <select class="form-control" id="employee_id" name="employee_id">
                <option>Select Employee</option>
                @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                @endforeach
            </select>
            @error('employee_id')
            <p class="error"> {{ $message }} </p>
            @enderror
        </div>

        <div class="form-group">
            <label for="office_id">Select Office:</label>
            <select class="form-control" id="office_id" name="office_id">
                <option>Select Office</option>
                @foreach($offices as $office)
                <option value="{{ $office->id }}">{{ $office->name }}</option>
                @endforeach
            </select>
            @error('office_id')
            <p class="error"> {{ $message }} </p>
            @enderror
        </div>


        <div class="form-group">
            <label for="booking_date">Date:</label>
            <input class="form-control" type="date" name="booking_date" id="booking_date" required
                min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" />
            @error('booking_date')
            <p class="error"> {{ $message }} </p>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection