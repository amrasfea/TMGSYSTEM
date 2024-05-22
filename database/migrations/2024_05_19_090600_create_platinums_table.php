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
            $table->string('P_registration_type');
            $table->string('P_title');
            $table->string('P_full_name');
            $table->string('P_identity_card');
            $table->string('P_gender');
            $table->string('P_religion');
            $table->string('P_race');
            $table->string('P_citizenship');
            $table->string('P_edu_level');
            $table->string('P_edu_field');
            $table->string('P_edu_institute');
            $table->string('P_occupation');
            $table->string('P_sponsorship');
            $table->string('P_address');
            $table->string('P_email');
            $table->string('P_phone');
            $table->string('P_fb_name');
            $table->string('P_program');
            $table->integer('P_batch');
            $table->boolean('P_referral')->default(false);
            $table->string('P_referral_name')->nullable();
            $table->string('P_referral_batch')->nullable();
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
