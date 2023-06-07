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
            $table->string('clientName');
            $table->string('clientUPI');
            $table->string('referringOfficer');
            $table->string('historyInvestigation');
            $table->string('diagnosis');
            $table->string('reasonReferral')->nullable();
            $table->string('attachments')->nullable();
            $table->string('additionalNotes');
            $table->string('priorityLevel');
            $table->string('serviceCategory');
            $table->string('service');
            $table->string('facility');
            $table->string('distance')->nullable();
            $table->string('serviceNotes');
            $table->string('referralId')->nullable();
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
