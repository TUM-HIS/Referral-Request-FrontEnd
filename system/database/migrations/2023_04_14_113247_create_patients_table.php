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
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->dateTime('dob');
            $table->string('idNo');
            $table->string('gender');
            $table->string('country');
            $table->string('countyOfBirth');
            $table->string('telephone');
            $table->string('telephone1')->nullable();
            $table->string('county');
            $table->string('subCounty');
            $table->string('village');
            $table->string('landmark')->nullable();
            $table->string('address')->nullable();
            $table->string('kinName');
            $table->string('relationship');
            $table->string('kinResidence')->nullable();
            $table->string('kinTelephone');
            $table->string('mail')->nullable();
            $table->string('upi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
