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
        Schema::create('corp_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('corp_id')->constrained('corps')->cascadeOnDelete();
            $table->string('ministry');
            $table->string('entity');
            $table->string('mission');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corp_reports');
    }
};