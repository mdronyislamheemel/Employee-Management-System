@extends('layout')

@section('content')

<a href="{{route('employee.crete')}}" class="btn btn-primary mb-3">New Employee</a>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Job Title</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->job_title }}</td>
                <td>{{ $employee->email ?? 'N/A' }}</td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{route('employee.show', $employee->id)}}" class="btn btn-primary btn-sm me-2">Details</a>

                        <form method="post" action="{{ route('employee.destroy', $employee->id) }}" onsubmit="return confirm('Are you sure you want to delete this info?')" class="me-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                        <a href="{{route('employee.edit', $employee->id)}}" class="btn btn-success btn-sm me-2">Update</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$employees->links()}}

@endsection