<?php

namespace App\Http\Controllers;

use App\Models\PaymentConcept;
use Illuminate\Http\Request;

class PaymentConceptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $concepts = PaymentConcept::paginate(10);
        return view('paymentConcept.index', compact('concepts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paymentConcept.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'concept' => 'required|string|max:255|unique:payment_concepts,concept',
        ]);

        PaymentConcept::create([
            'concept' => $request->concept,
        ]);

        return redirect()->route('paymentConcepts.index')
                         ->with('success', 'Concepto de pago creado con éxito.');
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
