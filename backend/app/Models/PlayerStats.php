<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerStats extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'category_id',
        'tournament_id',
        'game_id',
        'position',
        'minutes_played',
        'is_starter',
        'received_amonestation',
        'amonestation_type',
        'has_injury',
        'injury_duration',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
