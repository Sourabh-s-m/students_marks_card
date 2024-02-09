@extends('layouts.app')
@section('content')
    <h1 class="text-center mt-2 mb-3"><b>Students</b></h1>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <b>Manage Students</b>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('students.create') }}" class="btn btn-primary float-end">Add</a>
                        <form id="detailsForm" action="{{ route('students.filter') }}" method="post">
                            @csrf
                            <input type="hidden" name="student_id" id="studentId">
                            <button type="submit" id="detailsLink" class="btn btn-secondary float-end me-2">Selected
                                students
                                details</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
