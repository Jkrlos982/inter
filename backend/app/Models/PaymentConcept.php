<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentConcept extends Model
{
    use HasFactory;

    protected $fillable = ['concept'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
