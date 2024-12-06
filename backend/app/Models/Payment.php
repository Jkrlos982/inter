<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'payment_concept_id',
        'payment_date',
        'value',
        'month_payment'
    ];

    protected $dates = ['payment_date'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function paymentConcept()
    {
        return $this->belongsTo(PaymentConcept::class);
    }
}
