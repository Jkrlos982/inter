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
        $schedules = Schedule::with(['field', 'category'])->orderByDesc('start_time')->paginate(10);
        return view('schedule.index', compact('schedules'));
    }

    public function create()
    {
        $fields = Field::all();
        $categories = Category::with('user')->get(); // Suponiendo que el usuario es el profesor
        return view('schedule.create', compact('fields', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'field_id' => 'required|exists:fields,id',
            'category_id' => 'required|exists:categories,id',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        Schedule::create($request->all());
        return redirect()->route('schedule.index')->with('success', 'Horario creado exitosamente.');
    }

    public function show()
    {

    }

    public function edit(Schedule $schedule)
    {
        $fields = Field::all();
        $categories = Category::all();
        return view('schedule.edit', compact('schedule', 'fields', 'categories'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'field_id' => 'required|exists:fields,id',
            'category_id' => 'required|exists:categories,id',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $schedule->update($validated);
        return redirect()->route('schedule.index')->with('success', 'Horario Actualizado exitosamente.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedule.index')->with('success', 'Horario eliminado con éxito.');
    }


}
