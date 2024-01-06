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
        Schema::table('corps', function (Blueprint $table) {
            $table->boolean('send_reminder')->default(true)->after('has_branches');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('corps', function (Blueprint $table) {
            $table->dropColumn('send_reminder');
        });
    }
};