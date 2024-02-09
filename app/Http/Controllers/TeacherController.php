<?php

namespace App\Http\Controllers;

use App\DataTables\TeacherDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TeacherDataTable $dataTable)
    {
        return $dataTable->render('teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {
        $validatedData = $request->validated();
        if ($validatedData) {
            Teacher::create($validatedData);
            return redirect()->route('teachers.index')->with('success', 'Teacher data created successfully');
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
        $teacher = Teacher::findOrFail($id);
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $teacher = Teacher::findOrFail($id);

        if ($validatedData) {
            $teacher->update($validatedData);
            return redirect()->route('teachers.index')->with('success', 'Teacher data updated successfully');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Student::where('teacher_id', $id)->first();
        if ($teacher) {
            return redirect()->route('teachers.index')->with('error', 'Teacher data cannot be deleted because it is associated with student data');
        } else {
            $teacher = Teacher::findOrFail($id);
            $teacher->delete();
            return redirect()->route('teachers.index')->with('success', 'Teacher data deleted successfully');
        }
    }
}
