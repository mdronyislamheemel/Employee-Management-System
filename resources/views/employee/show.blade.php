@extends('layout')

@section('content')

<div class="mt-5">
    <a href="{{route('employee.index')}}" class="btn btn-primary mb-3">Back</a>

    <div class="card">
        <div class="card-header">
            <h3>Employee Details</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $employee->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $employee->name }}</td>
                    </tr>
                    <tr>
                        <th>Job Title</th>
                        <td>{{ $employee->job_title }}</td>
                    </tr>
                    <tr>
                        <th>Joining Date</th>
                        <td>{{ $employee->joining_date }}</td>
                    </tr>
                    <tr>
                        <th>Salary</th>
                        <td>${{ number_format($employee->salary, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $employee->email ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Mobile No</th>
                        <td>{{ $employee->mobile_no }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $employee->address }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
