@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Students Information</h2>
            </div>
            <div class="col">
                <a href="{{ route('students.index') }}" class="btn btn-secondary float-end">Back</a>
            </div>
        </div>
        <table class="table table-border">
            <thead class="table-dark">
                <td>Name</td>
                <td>Teacher Name</td>
                <td>Class</td>
                <td>Subject</td>
                <td>Marks</td>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->teacher_name }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ $student->subject }}</td>
                        <td>{{ $student->marks }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
