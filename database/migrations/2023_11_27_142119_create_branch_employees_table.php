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
        Schema::create('branch_employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('corp_branch_id')->constrained('corp_branches')->cascadeOnDelete();
            $table->string('name');
            $table->string('resident_number');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('business_card_start_date');
            $table->date('business_card_end_date');
            $table->date('contract_start_date');
            $table->date('contract_end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_employees');
    }
};