<?php

namespace App\Http\Controllers;

use App\Models\PlayerStats;
use App\Models\Player;
use App\Models\Category;
use App\Models\Tournament;
use App\Models\Game;
use Illuminate\Http\Request;

class PlayerStatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playerStats = PlayerStats::with(['player', 'category', 'tournament', 'game'])->paginate(10);

        return view('player_stats.index', compact('playerStats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $players = Player::all();
        $categories = Category::all();
        $tournaments = Tournament::all();
        $games = Game::all();
        return view('player_stats.create', compact('players', 'categories', 'tournaments', 'games'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'player_id' => 'required|exists:players,id',
            'category_id' => 'required|exists:categories,id',
            'tournament_id' => 'required|exists:tournaments,id',
            'game_id' => 'required|exists:games,id',
            'position' => 'required|string|max:255',
            'minutes_played' => 'required|integer|min:0',
            'is_starter' => 'required|boolean',
            'received_amonestation' => 'required|boolean',
            'amonestation_type' => 'nullable|string|max:255',
            'has_injury' => 'required|boolean',
            'injury_duration' => 'nullable|integer|min:0',
        ]);

        PlayerStats::create($request->all());
        
        return redirect()->route('player_stats.index')->with('success', 'Estadísticas del jugador creadas exitosamente.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
