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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbreviation');
            $table->string('description');
            $table->string('location_desc');
            $table->string('number_of_beds');
            $table->string('number_of_cots');
            $table->string('open_whole_day');
            $table->string('open_whole_week');
            $table->string('facility_type');
            $table->string('operation_status');
            $table->string('ward');
            $table->string('owner');
            $table->string('officer_in_charge');
            $table->string('physical_address');
            $table->string('parent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
