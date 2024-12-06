<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['field_id', 'category_id', 'start_time', 'end_time'];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
