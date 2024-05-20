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
        Schema::create('admin_blocks', function (Blueprint $table) {
            $table->bigIncrements('FB_ABlockID');
            $table->unsignedBigInteger('FB_WeeklyFocusID');
            $table->foreign('FB_WeeklyFocusID')->references('FB_WeeklyFocusID')->on('WeeklyFocusBlocks');
            $table->date('FB_StartDate');
            $table->date('FB_EndDate');
            $table->string('FB_BlockItem');
            $table->string('FB_BlockDetail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_blocks');
    }
};
