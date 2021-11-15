@extends('layouts.app')

@section('content')
<div class="container col-12 main-container">

    <h2>Office List</h2>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ session('message') }}</strong>
    </div>
    @endif

    <a href="{{ url('office/register') }}" class="btn btn-primary" role="button">Add</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>No. Of Seats</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offices as $office)
            <tr>
                <td>{{ $office->name }}</td>
                <td>{{ $office->seatCount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection