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
        Schema::create('referal_requests', function (Blueprint $table) {
            $table->id();
            $table->string('identifier');
            $table->string('definition');
            $table->string('basedOn');
            $table->string('replaces');
            $table->string('groupIdentifier');
            $table->string('status');
            $table->string('intent');
            $table->string('type');
            $table->string('priority');
            $table->string('serviceRequested');
            $table->string('subject');
            $table->string('context');
            $table->string('occurrence');
            $table->string('authoredOn');
            $table->string('requester');
            $table->string('specialty');
            $table->string('recipient');
            $table->string('reasonCode');
            $table->string('reasonReference');
            $table->string('description');
            $table->string('supportingInfo');
            $table->string('note');
            $table->string('relevantHistory');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referal_requests');
    }
};
