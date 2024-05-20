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
            $table->M_mentorID();
            $table->string('u_id');
            $table->foreign('u_id')->references('u_id')->on('users');
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
