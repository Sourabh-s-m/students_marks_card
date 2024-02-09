@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="card box-shadow">
                    <div class="card-body">
                        <h3 class="card-title"><a href="{{ route('teachers.index') }}" class="text-decoration-none"><b>
                                    <span class="text-success">Teachers Count</span>
                                    <span class="float-end fs-1">{{ $teachersCount }}</span></b></a></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card box-shadow">
                    <div class="card-body">
                        <h3 class="card-title"><a href="{{ route('students.index') }}" class="text-decoration-none"><b>
                                    <span class="text-dark">Students Count</span>
                                    <span class="float-end fs-1">{{ $studentsCount }}</span></b></a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
