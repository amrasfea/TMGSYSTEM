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
        Schema::create('expert_domains', function (Blueprint $table) {
            $table->ED_ID()->primary();
            $table->string('id');
            $table->foreign('id')->references('id')->on('platinums');
            $table->string('M_mentorID');
            $table->foreign('M_mentorID')->references('M_mentorID')->on('mentors');
            $table->string('ED_Name');
            $table->string('ED_Uni');
            $table->string('ED_Email');
            $table->string('ED_PhoneNum');
            $table->string('ED_Research');
            $table->string('ED_Paper');
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
