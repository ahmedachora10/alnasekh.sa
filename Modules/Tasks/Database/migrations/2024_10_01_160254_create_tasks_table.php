<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Tasks\App\Enums\TaskPriority;
use Modules\Tasks\App\Enums\TaskStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId( 'created_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('assigned_to')->nullable()->constrained('users');
            $table->string('name');
            $table->string('description');
            // $table->date('due_date')->nullable();
            $table->date('assigned_at')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->dateTime('completed')->nullable();
            $table->enum('status', array_map(fn($item) => $item->value, TaskStatus::cases()))->default(TaskStatus::Pending->value);
            $table->enum('priority', array_map(fn($item) => $item->value, TaskPriority::cases()))->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
