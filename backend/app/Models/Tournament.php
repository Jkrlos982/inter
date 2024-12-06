<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'start_date', 'end_date'];

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_tournament');
    }
}
