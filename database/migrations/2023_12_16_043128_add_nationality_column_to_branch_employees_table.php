<?php

use App\Enums\Nationalities;
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
        Schema::table('branch_employees', function (Blueprint $table) {
            $table->tinyInteger('nationality')->default(Nationalities::SAUDIA->value)->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('branch_employees', function (Blueprint $table) {
            $table->dropColumn('nationality');
        });
    }
};