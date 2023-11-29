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
        Schema::create('employee_medical_insurances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_employee_id')->constrained('branch_employees')->cascadeOnDelete();
            $table->string('company');
            $table->string('policy');
            $table->string('type');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_medical_insurances');
    }
};