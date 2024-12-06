<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Category;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::with('categories')->paginate(10);
        return view('tournaments.index', compact('tournaments'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tournaments.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'category_id' => 'required|array',
        ]);

        $tournament = Tournament::create($validated);
        $tournament->categories()->attach($validated['category_id']);

        return redirect()->route('tournament.index')->with('success', 'Torneo creado con éxito.');
    }

    public function show(Tournament $tournament)
    {
        $tournament->load('categories');
        return view('tournaments.show', compact('tournament'));
    }

    public function edit(Tournament $tournament)
    {
        $categories = Category::all();
        return view('tournaments.edit', compact('tournament', 'categories'));
    }

    public function update(Request $request, Tournament $tournament)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'categories' => 'required|array',
        ]);

        $tournament->update($validated);
        $tournament->categories()->sync($validated['categories']);

        return redirect()->route('tournament.index')->with('success', 'Torneo actualizado con éxito.');
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->categories()->detach();
        $tournament->delete();
        
        return redirect()->route('tournament.index')->with('success', 'Torneo eliminado con éxito.');
    }
}
