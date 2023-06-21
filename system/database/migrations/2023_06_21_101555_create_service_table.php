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
        Schema::create('service', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('name');
            $table->string('abbreviation')->nullable();;
            $table->boolean('active');
            $table->string('category');
            $table->string('category_name');
            $table->integer('code');           
            $table->string('created');
            $table->integer('created_by');
            $table->string('category_name');
            $table->boolean('deleted');
            $table->string('description')->nullable();
            $table->string('group');
            $table->boolean('has_options');
            $table->string('keph_level')->nullable();
            $table->string('search')->nullable();
            $table->string('updated');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
