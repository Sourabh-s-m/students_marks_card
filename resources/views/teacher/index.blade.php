@extends('layouts.app')
@section('content')
    <h1 class="text-center mt-2 mb-3"><b>Teachers</b></h1>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <b>Manage Teachers</b>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('teachers.create') }}" class="btn btn-primary float-end">Add</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
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
