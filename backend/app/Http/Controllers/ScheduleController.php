<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Field;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $schedules = Schedule::with(['field', 'category'])->paginate(10);
        return view('schedule.index', compact('schedules'));
    }

    public function create()
    {
        $fields = Field::all();
        $categories = Category::with('user')->get(); // Suponiendo que el usuario es el profesor
        return view('schedules.create', compact('fields', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'field_id' => 'required|exists:fields,id',
            'category_id' => 'required|exists:categories,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        Schedule::create($request->all());
        return redirect()->route('schedule.index')->with('success', 'Horario creado exitosamente.');
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function destroy()
    {

    }


}
