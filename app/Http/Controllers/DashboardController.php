<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $studentsCount = Student::count();
        $teachersCount = Teacher::count();
        return view('dashboard', compact('studentsCount', 'teachersCount'));
    }
}
