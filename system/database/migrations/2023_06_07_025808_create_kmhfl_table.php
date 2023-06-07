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
        Schema::create('m_f_l_s', function (Blueprint $table) {
            $table->id();
            $table->integer('Code');
            $table->string('Officialname');
            $table->string('Province')->nullable();;
            $table->string('County')->nullable();;
            $table->string('Sub county')->nullable();;
            $table->string('Ward')->nullable();;
            $table->string('Facility type')->nullable();;
            $table->string('Owner type')->nullable();;
            $table->string('Constituency')->nullable();;
            $table->boolean('Open_whole_day')->nullable();;
            $table->boolean('Open_weekends')->nullable();;
            $table->string('Operation status')->nullable();;
            $table->boolean('ANC')->nullable();
            $table->boolean('ART')->nullable();
            $table->boolean('BEOC')->nullable();
            $table->boolean('BLOOD')->nullable();
            $table->boolean('CAES SEC')->nullable();
            $table->boolean('CEOC')->nullable();
            $table->boolean('C-IMCI')->nullable();
            $table->boolean('EPI')->nullable();
            $table->boolean('FP')->nullable();
            $table->boolean('GROWM')->nullable();
            $table->boolean('HBC')->nullable();
            $table->boolean('HCT')->nullable();
            $table->boolean('IPD')->nullable();
            $table->boolean('OPD')->nullable();
            $table->boolean('OUTREACH')->nullable();
            $table->boolean('PMTCT')->nullable();
            $table->boolean('RAD/XRAY')->nullable();
            $table->boolean('RHTC/RHDC')->nullable();
            $table->boolean('TB DIAG')->nullable();
            $table->boolean('TB LABS')->nullable();
            $table->boolean('TB TREAT')->nullable();
            $table->boolean('YOUTH')->nullable();
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
