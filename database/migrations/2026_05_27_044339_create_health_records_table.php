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
        Schema::create('health_records', function (Blueprint $table) {
            $table->id();
            $table->date('recorded_date');
            $table->integer('steps')->nullable();
            $table->decimal('weight_lbs', 5, 1)->nullable();
            $table->integer('resting_heart_rate')->nullable();
            $table->integer('active_calories')->nullable();
            $table->integer('total_calories')->nullable();
            $table->decimal('sleep_hours', 4, 1)->nullable();
            $table->integer('sleep_score')->nullable();
            $table->integer('stand_hours')->nullable();
            $table->integer('exercise_minutes')->nullable();
            $table->decimal('vo2_max', 4, 1)->nullable();
            $table->integer('hrv')->nullable();
            $table->text('notes')->nullable();
            $table->string('source')->default('manual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_records');
    }
};
