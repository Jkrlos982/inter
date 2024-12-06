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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fatherName');
            $table->string('fatherProfession');
            $table->string('fatherCompanyName');
            $table->string('fatherPhoneNumber');
            $table->string('motherName');
            $table->string('motherProfession');
            $table->string('motherCompanyName');
            $table->string('motherPhoneNumber');
            $table->date('birthDate');
            $table->string('bithPlace');
            $table->string('docId')->unique();
            $table->string('address');
            $table->string('neighborhood');
            $table->string('stratum');
            $table->string('city');
            $table->string('eps');
            $table->string('weight');
            $table->string('height');
            $table->string('blood');
            $table->string('contactEmail');
            $table->string('contactPhone');
            $table->string('school');
            $table->string('grade');
            $table->string('schoolCity');
            $table->string('schoolStartHour');
            $table->string('schoolEndHour');
            $table->string('uniformSize');
            $table->string('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
