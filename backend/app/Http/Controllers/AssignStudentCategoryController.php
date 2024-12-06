<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssignStudentCategoryController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $categories = Category::all();

        return view('student.assign.index', compact('students', 'categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, Student $student)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|integer|min:2000|max:' . Carbon::now()->year,
        ]);

        // Añade la categoría para el año específico
        $student->categories()->attach($request->category_id, ['year' => $request->year]);

        return redirect()->route('studentAssign.index')->with('success', 'Categoría asignada exitosamente con historial.');
    }

    public function show(Student $student)
    {
        return view('student.assign.create', compact('student'));
    }
}
