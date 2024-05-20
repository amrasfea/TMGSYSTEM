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
        Schema::create('mentors', function (Blueprint $table) {
            $table->bigIncrements('M_mentorID');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');
            $table->string('M_phoneNum');
            $table->string('M_position');
            $table->string('M_name');
            $table->string('M_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentors');
    }
};
