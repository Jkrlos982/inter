<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'fatherName', 
        'fatherProfession', 
        'fatherCompanyName', 
        'fatherPhoneNumber', 
        'motherName', 
        'motherProfession', 
        'motherCompanyName', 
        'motherPhoneNumber',
        'birthDate',
        'bithPlace',
        'docId',
        'address',
        'neighborhood',
        'stratum',
        'city',
        'eps',
        'weight',
        'height',
        'blood',
        'contactEmail',
        'contactPhone',
        'school',
        'grade',
        'schoolCity',
        'schoolStartHour',
        'schoolEndHour',
        'uniformSize',
        'position',
        'type',
        'photo'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class)
                    ->withPivot('year') // Incluye el campo 'year' en la relación
                    ->withTimestamps();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
