<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classes;

class StudentClassController extends Controller
{
    public function getClassesByStudent($student_id)
    {
        $student = Student::findOrFail($student_id);
        $classes = $student->classes;
        return response()->json(['data' => $classes]);
    }

    public function getStudentsByClass($class_id)
    {
        $class = Classes::findOrFail($class_id);
        $students = $class->students;
        return response()->json(['data' => $students]);
    }

    public function assignClassToStudent(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'student_id' => 'required|exists:students,id',
        ]);

        $class = Classes::findOrFail($request->class_id);
        $student = Student::findOrFail($request->student_id);

        if ($student->classes->contains($class)) {
            return response()->json(['message' => 'Student is already assigned to this class.'], 400);
        }

        $student->classes()->attach($class);

        return response()->json(['message' => 'Class assigned successfully.']);
    }

    public function removeClassFromStudent(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'student_id' => 'required|exists:students,id',
        ]);

        $class = Classes::findOrFail($request->class_id);
        $student = Student::findOrFail($request->student_id);

        if (!$student->classes->contains($class)) {
            return response()->json(['message' => 'Student is not assigned to this class.'], 400);
        }

        $student->classes()->detach($class);

        return response()->json(['message' => 'Class removed successfully.']);
    }
}