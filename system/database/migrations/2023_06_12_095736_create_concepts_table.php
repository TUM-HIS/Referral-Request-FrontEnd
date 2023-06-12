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
        Schema::create('concepts', function (Blueprint $table) {
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
            $table->string('external id');
            $table->string('concept class');
            $table->string('datatype');
            $table->string('comment')->nullable();
            $table->integer('parent_id');
            $table->integer('versioned_object_id');
            $table->integer('mnemonic');
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
        Schema::dropIfExists('concepts');
    }
};
