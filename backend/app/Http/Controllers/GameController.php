<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tournament;
use App\Models\Category;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with(['tournament', 'category'])->paginate(10);
        return view('game.index', compact('games'));
    }

    public function create()
    {
        $tournaments = Tournament::all();
        $categories = Category::all();
        return view('game.create', compact('tournaments', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'match_date' => 'required|date',
            'tournament_id' => 'required|exists:tournaments,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        Game::create($validated);

        return redirect()->route('game.index')->with('success', 'Partido creado con éxito.');
    }

    public function show(Game $game)
    {
        $game->load(['tournament', 'category']);
        return view('games.show', compact('games'));
    }

    public function edit(Game $game)
    {
        $tournaments = Tournament::all();
        $categories = Category::all();
        return view('game.edit', compact('game', 'tournaments', 'categories'));
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'match_date' => 'required|date',
            'tournament_id' => 'required|exists:tournaments,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $game->update($validated);

        return redirect()->route('game.index')->with('success', 'Partido actualizado con éxito.');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('gameses.index')->with('success', 'Partido eliminado con éxito.');
    }
}
