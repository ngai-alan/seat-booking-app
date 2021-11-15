@extends('layouts.app')

@section('content')
<div class="container col-12 main-container">

    <h2>Employee List</h2>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ session('message') }}</strong>
    </div>
    @endif

    <a href="{{ url('employee/register') }}" class="btn btn-primary" role="button">Add</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Payroll Number</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->payroll_number }}</td>
                <td>{{ $employee->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection