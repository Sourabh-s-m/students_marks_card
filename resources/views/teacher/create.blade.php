@extends('layouts.app')
@section('content')
    <div class="container mt-5 bg-light border-1 border pb-5 pt-3 ps-3 pe-3">
        <div class="row">
            <div class="col">
                <h2>Add Teacher</h2>
            </div>
            <div class="col">
                <a href="{{ route('teachers.index') }}" class="btn btn-secondary float-end">Back</a>
            </div>
        </div>
        <form id="teacherForm" action="{{ route('teachers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
            <button type="submit" class="btn btn-primary float-end">Submit</button>
        </form>
    </div>
@endsection
