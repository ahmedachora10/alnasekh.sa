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
        Schema::create('corp_branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('corp_id')->constrained('corps')->cascadeOnDelete();
            $table->string('name');
            $table->string('registration_number');;
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corp_branches');
    }
};
