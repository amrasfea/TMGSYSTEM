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
        Schema::create('draft_thesis_performances', function (Blueprint $table) {
            $table->bigIncrements('DTP_DraftNum');
            $table->unsignedBigInteger('C_ID');
            $table->foreign('C_ID')->references('C_ID')->on('crmps');
            $table->unsignedBigInteger('M_mentorID');
            $table->foreign('M_mentorID')->references('M_mentorID')->on('mentors');
            $table->date('DTP_StartDate');
            $table->date('DTP_CompletionDate');
            $table->integer('DTP_PagesNum');
            $table->string('DTP_DDCgroup');
            $table->integer('DTP_PrepareDays');
            $table->integer('DTP_TotalPages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('draft_thesis_performances');
    }
};
