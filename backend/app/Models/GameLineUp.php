<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GameLineUp extends Model
{
    use HasFactory;

    protected $fillable = ['game_id', 'position', 'student_id'];

    public function games()
    {
        return $this->belongsTo(Game::class);
    }
}
