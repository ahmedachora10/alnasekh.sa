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
        Schema::table('corp_reports', function (Blueprint $table) {
            $table->foreignId('ministry')->change();
            $table->foreignId('entity')->change();
            $table->foreignId('mission')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('corp_reports', function (Blueprint $table) {
            $table->string('ministry')->change();
            $table->string('entity')->change();
            $table->string('mission')->change();
        });
    }
};
