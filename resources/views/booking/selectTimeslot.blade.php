@extends('layouts.app')


@section('content')
<div class="container col-6 col-offset-3 main-container">

    <div class="container col-12">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Office</th>
                    <th>Employee</th>
                    <th>BookingDate</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $office_name }}</td>
                    <td>{{ $employee_name }}</td>
                    <td>{{ $booking_date }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card">
        @foreach ($seats as $seat)
        <div class="card-header">{{ $seat->name }}</div>
        <div class="card-body">
            @if ($seat->bookings->count() > 0 && !$seat->bookings->contains('timeslot_id', 1))
            <form method="POST" action="{{ url('booking/reserve') }}">
                @csrf
                <input type="hidden" name="seat_id" id="seat_id" value="{{ $seat->id }}" />
                <input type="hidden" name="employee_id" id="employee_id" value="{{ $employee_id }}" />
                <input type="hidden" name="booking_date" id="booking_date" value="{{ $booking_date }}" />
                <div class="input-group mt-3">
                    <select class="form-control" id="timeslot_id" name="timeslot_id">
                        <option>Select Available Timeslot</option>
                        @foreach($timeslots as $timeslot)
                        @if (!$seat->bookings->contains('timeslot_id', $timeslot->id) && $timeslot->id != 1 )
                        <option value="{{ $timeslot->id }}">{{ $timeslot->name }}</option>
                        @endif
                        @endforeach
                    </select>
                    <div class="input-group-prepend">

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                @error('timeslot_id')
                <p class="error"> {{ $message }} </p>
                @enderror

                <br />

            </form>
            @elseif ($seat->bookings->count() > 0)
            <div class="d-flex justify-content-center">
                <p>Full Booked</p>
            </div>
            @else
            <form method="POST" action="{{ url('booking/reserve') }}">
                @csrf
                <input type="hidden" name="seat_id" id="seat_id" value="{{ $seat->id }}" />
                <input type="hidden" name="employee_id" id="employee_id" value="{{ $employee_id }}" />
                <input type="hidden" name="booking_date" id="booking_date" value="{{ $booking_date }}" />
                <div class="input-group mt-3">
                    <select class="form-control" id="timeslot_id" name="timeslot_id">
                        <option>Select Available Timeslot</option>
                        @foreach($timeslots as $timeslot)
                        <option value="{{ $timeslot->id }}">{{ $timeslot->name }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-prepend">

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                @error('timeslot_id')
                <p class="error"> {{ $message }} </p>
                @enderror

                <br />

            </form>
            @endif
        </div>

        @endforeach

    </div>

</div>
@endsection