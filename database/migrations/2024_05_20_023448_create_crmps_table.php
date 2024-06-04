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
        Schema::create('crmps', function (Blueprint $table) {
            $table->bigIncrements('C_ID');
            $table->unsignedBigInteger('S_staffID');
            $table->foreign('S_staffID')->references('S_staffID')->on('staff');
            $table->unsignedBigInteger('P_platinumID');
            $table->foreign('P_platinumID')->references('P_platinumID')->on('platinums');
            $table->unsignedBigInteger('FB_WeeklyFocusID');
            $table->foreign('FB_WeeklyFocusID')->references('FB_WeeklyFocusID')->on('WeeklyFocusBlocks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crmps');
    }
};
