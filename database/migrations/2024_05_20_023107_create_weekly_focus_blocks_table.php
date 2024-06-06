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
        Schema::create('weekly_focus_blocks', function (Blueprint $table) {
            $table->bigIncrements('FB_WeeklyFocusID');
            $table->unsignedBigInteger('P_platinumID');
            $table->foreign('P_platinumID')->references('P_platinumID')->on('platinums');
            $table->unsignedBigInteger('M_mentorID');
            $table->foreign('M_mentorID')->references('M_mentorID')->on('mentors');
            $table->string('FB_BlockType');
            $table->string('FB_BlockDesc');
            $table->date('FB_StartDate');
            $table->date('FB_EndDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_focus_blocks');
    }
};
