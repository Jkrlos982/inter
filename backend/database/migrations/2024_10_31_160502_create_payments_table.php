<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade'); // Relación con estudiantes
            $table->foreignId('payment_concept_id')->constrained('payment_concepts'); // Relación con conceptos de pago
            $table->date('payment_date'); // Fecha de pago
            $table->bigInteger('value');
            $table->string('month_payment')->nullable(); // Mes de pago, solo para conceptos de "Mensualidad"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
