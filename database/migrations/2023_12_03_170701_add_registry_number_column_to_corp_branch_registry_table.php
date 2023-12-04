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
        Schema::table('corp_branch_registry', function (Blueprint $table) {
            $table->string('registry_number')->nullable()->after('commercial_registration_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('corp_branch_registry', function (Blueprint $table) {
            $table->dropColumn('registry_number');
        });
    }
};