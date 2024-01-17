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
        Schema::create('subscribe_package_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained('packages')->cascadeOnDelete();
            $table->string('company_name');
            $table->string('administrator_name');
            $table->string('commercial_registration_number');
            $table->string('company_activity');
            $table->string('phone');
            $table->string('email');
            $table->string('company_size');
            $table->integer('number_of_resident_employees');
            $table->integer('number_of_suadi_employees');
            $table->integer('total_employees');
            $table->string('company_headquarters');
            $table->string('company_type');
            $table->string('company_city');
            $table->integer('number_of_branches');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribe_package_requests');
    }
};