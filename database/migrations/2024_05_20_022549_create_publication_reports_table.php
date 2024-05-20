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
        Schema::create('publication_reports', function (Blueprint $table) {
            $table->bigIncrements('PR_ID');
            $table->date('PR_Date');
            $table->string('PR_Description');
            $table->unsignedBigInteger('M_mentorID');
            $table->foreign('M_mentorID')->references('M_mentorID')->on('mentors');
            $table->unsignedBigInteger('PB_ID');
            $table->foreign('PB_ID')->references('PB_ID')->on('publications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publication_reports');
    }
};
