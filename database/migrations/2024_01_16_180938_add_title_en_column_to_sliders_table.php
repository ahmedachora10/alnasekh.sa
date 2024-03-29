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
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('image_en')->nullable()->after('image');
            $table->string('title_en')->nullable()->after('title');
            $table->string('delay_en')->nullable()->after('delay');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn('image_en');
            $table->dropColumn('title_en');
            $table->dropColumn('delay_en');

        });
    }
};