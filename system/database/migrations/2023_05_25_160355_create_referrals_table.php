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
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->string('referralId')->nullable();
            $table->string('clientName')->nullable();
            $table->string('clientUPI')->nullable();
            $table->string('referringOfficer')->nullable();
            $table->string('referredFacility')->nullable();
            $table->string('historyInvestigation')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('reasonReferral')->nullable();
            $table->string('attachments')->nullable();
            $table->string('additionalNotes')->nullable();
            $table->string('priorityLevel')->nullable();
            $table->string('serviceCategory')->nullable();
            $table->string('service')->nullable();
            $table->string('status')->nullable();
            $table->string('referring_facility_id')->nullable();
            $table->string('distance')->nullable();
            $table->string('serviceNotes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};
