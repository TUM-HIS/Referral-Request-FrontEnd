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
        Schema::create('nhdds', function (Blueprint $table) {
            $table->string('id');
            $table->string('public_access');
            $table->string('created_at');
            $table->string('updated_at');
            $table->string('created_by_id');
            $table->string('updated_by_id');
            $table->string('is_active');
            $table->string('extras');
            $table->string('uri');
            $table->string('version');
            $table->string('released');
            $table->string('retired');
            $table->string('is_latest_version');
            $table->string('name');
            $table->string('full_name');
            $table->string('default_locale');
            $table->string('supported_locales');
            $table->string('website');
            $table->string('description');
            $table->string('external_id');
            $table->string('concept_class');
            $table->string('datatype');
            $table->string('comment');
            $table->string('parent_id');
            $table->string('versioned_object_id');
            $table->string('mnemonic');
            $table->string('counted');
            $table->string('index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhdds');
    }
};
