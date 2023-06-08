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
        Schema::table('m_f_l_s', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_f_l_s', function (Blueprint $table) {
            //
            $table->dropColumn('id');
        });
    }
};
