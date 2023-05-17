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
        Schema::create('triages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->string('reason_for_visit');
            $table->float('blood_pressure');
            $table->float('heart_rate');
            $table->float('respiratory_rate');
            $table->float('temperature');
            $table->float('oxygen_saturation');
            $table->integer('pain_level');
            $table->string('allergies');
            $table->string('medications');
            $table->string('medical_history');
            $table->string('recent_travel');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_phone', 15);
            $table->string('emergency_contact_relation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('triages');
    }
};
