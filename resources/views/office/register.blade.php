@extends('layouts.app')


@section('content')
<div class="container col-6 col-offset-3 main-container">

    <h2>Office Creation</h2>
    <form method="POST" action="{{ url('office/register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name"
                value="{{ old('name') }}" required />
            @error('name')
            <p class="error"> {{ $message }} </p>
            @enderror
        </div>

        <div class="form-group">
            <label for="numberOfSeats">No. of Seats:</label>
            <input type="text" class="form-control" id="numberOfSeats" name="numberOfSeats"
                value="{{ old('numberOfSeats') }}" required />
            @error('numberOfSeats')
            <p class="error"> {{ $message }} </p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection