@extends('layouts.app')
@section('content')
    <div class="container mt-5 bg-white bg-border border pb-5 pt-3 ps-3 pe-3">
        <div class="row">
            <div class="col">
                <h2>Edit Student</h2>
            </div>
            <div class="col">
                <a href="{{ route('students.index') }}" class="btn btn-secondary float-end">Back</a>
            </div>
        </div>

        <form id="studentForm" action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                    value="{{ $student->name }}" required>
            </div>
            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <input type="number" class="form-control" id="class" placeholder="Class" name="class"
                    value="{{ $student->class }}" required>
            </div>
            <div class="mb-3">
                <label for="teacher_id" class="form-label">Teacher Name</label>
                <select class="form-select" id="teacher_id" name="teacher_id" required>
                    <option value="">Please select teacher</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ $teacher->id == $student->teacher_id ? 'selected' : '' }}>
                            {{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject"
                    value="{{ $student->subject }}" required>
            </div>
            <div class="mb-3">
                <label for="marks" class="form-label">Marks</label>
                <input type="number" class="form-control" id="marks" name="marks" placeholder="Marks"
                    value="{{ $student->marks }}" required>
            </div>
            <button type="submit" class="btn btn-primary float-end">Update</button>
        </form>
    </div>
@endsection
