<?php

use App\Enums\HasBranches;
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
        Schema::create('corps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('administrator_name');
            $table->string('phone');
            $table->string('email');
            $table->string('commercial_registration_number');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('has_branches', HasBranches::values());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corps');
    }
};
