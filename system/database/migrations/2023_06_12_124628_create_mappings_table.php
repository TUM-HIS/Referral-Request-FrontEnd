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
        Schema::create('mappings', function (Blueprint $table) {
            $table->string('checksums');
            $table->integer('id');
            $table->string('public access');
            $table->string('created at');
            $table->string('updated at');
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->boolean('is active');
            $table->string('extras');
            $table->string('uri');
            $table->integer('version');
            $table->boolean('released');
            $table->boolean('retired');
            $table->boolean('is latest version');
            $table->string('custom validation schema')->nullable();
            $table->integer('parent_id');
            $table->string('map type');
            $table->string('sort weight')->nullable();
            $table->string('external id');
            $table->string('comment')->nullable();
            $table->integer('versioned_object_id');
            $table->integer('mnemonic');
            $table->integer('from_concept_id');
            $table->string('to_concept_id')->nullable();
            $table->integer('to_source_id');
            $table->integer('from_source_id');
            $table->integer('from concept code');
            $table->string('from concept name');
            $table->string('from source url');
            $table->string('from source version')->nullable();
            $table->bigInteger('to concept code');
            $table->string('to concept name')->nullable();
            $table->string('to source url');
            $table->string('to source version')->nullable();
            $table->boolean('counted');
            $table->boolean('index');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mappings');
    }
};
