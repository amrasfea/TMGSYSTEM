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
        Schema::create('expertDomains', function (Blueprint $table) {
            $table->bigIncrements('ED_ID');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('platinums');
            $table->unsignedBigInteger('M_mentorID');
            $table->foreign('M_mentorID')->references('M_mentorID')->on('mentors');
            $table->string('E_title'); // Add this line
            $table->string('E_full_name'); // Add this line
            // Add other columns as needed
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expert_domains');
    }
};
