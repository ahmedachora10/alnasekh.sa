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
        Schema::create('branch_certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('corp_branch_id')->constrained('corp_branches')->cascadeOnDelete();
            $table->string('certificate_number');
            $table->string('type')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('branch_certificates');
    }
};