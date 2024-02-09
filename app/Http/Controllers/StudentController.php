<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\DataTables\studentDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(studentDataTable $dataTable)
    {
        return $dataTable->render('student.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('student.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $validatedData = $request->validated();
        if ($validatedData) {
            Student::create($validatedData);
            return redirect()->route('students.index')->with('success', 'Student data created successfully');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        $teachers = Teacher::all();
        return view('student.edit', compact('student', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $student = Student::findOrFail($id);

        if ($validatedData) {
            $student->update($validatedData);
            return redirect()->route('students.index')->with('success', 'Student data updated successfully');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student data deleted successfully');
    }
    public function filter(Request $request)
    {
        $studentIds = explode(',', $request->student_id);
        $students = Student::whereIn('students.id', $studentIds)->join('teachers', 'students.teacher_id', 'teachers.id')
            ->select('students.name as name', 'teachers.name as teacher_name', 'students.class as class', 'students.subject as subject', 'students.marks as marks', 'students.id')
            ->get();
        return view('student.filter', compact('students'));
    }
}
