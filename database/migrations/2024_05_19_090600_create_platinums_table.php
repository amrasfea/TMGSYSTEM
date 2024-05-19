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
        Schema::create('platinums', function (Blueprint $table) {
            $table->id();
            $table->string('registration_type');
            $table->string('title');
            $table->string('full_name');
            $table->string('identity_card');
            $table->string('gender');
            $table->string('religion');
            $table->string('race');
            $table->string('citizenship');
            $table->string('edu_level');
            $table->string('edu_field');
            $table->string('edu_institute');
            $table->string('occupation');
            $table->string('sponsorship');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('fb_name');
            $table->string('program');
            $table->integer('batch');
            $table->boolean('referral')->default(false);
            $table->string('referral_name');
            $table->string('referral_batch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platinums');
    }
};
