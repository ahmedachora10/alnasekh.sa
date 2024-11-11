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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
            $table->string('company_name')->nullable();
            $table->string('administrator_name')->nullable();
            $table->string('commercial_registration_number')->nullable();
            $table->string('company_activity')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('company_size')->nullable();
            $table->integer('number_of_resident_employees')->nullable();
            $table->integer('number_of_suadi_employees')->nullable();
            $table->integer('total_employees')->nullable();
            $table->string('company_headquarters')->nullable();
            $table->string('company_type')->nullable();
            $table->string('company_city')->nullable();
            $table->integer('number_of_branches')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};