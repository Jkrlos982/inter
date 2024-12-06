<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentConcept;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); 

        $payments = Payment::with(['student', 'paymentConcept'])
            ->whereHas('student', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')->paginate(10);

        $paymentConcepts = PaymentConcept::all();

        return view('payment.index', compact('payments', 'paymentConcepts', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::where('type', 'Pago')->get();
        $concepts = PaymentConcept::all();

        return view('payment.create', compact('students', 'concepts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'payment_concept_id' => 'required|exists:payment_concepts,id',
            'payment_date' => 'required|date',
            'value' => 'required',
            'month_payment' => 'nullable|string'
        ]);

        $concept = PaymentConcept::find($request->payment_concept_id);

        if ($concept->concept === 'Mensualidad' && empty($request->month_payment)) {
            return back()->withErrors(['month_payment' => 'El campo Mes de Pago es obligatorio para el concepto Mensualidad.']);
        }

        Payment::create($validated);

        return redirect()->route('payment.index')->with('success', 'Pago registrado correctamente.');
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
