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
        Schema::create('branch_monthly_quarterly', function (Blueprint $table) {
            $table->id();
            $table->foreignId('corp_branch_id')->constrained('corp_branches')->cascadeOnDelete();
            $table->foreignId('monthly_quarterly_update_id')->constrained('monthly_quarterly_updates')->cascadeOnDelete();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_monthly_quarterly');
    }
};