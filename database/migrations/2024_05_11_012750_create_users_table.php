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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('roleType',['Staff','Mentor','Platinum'])->default('Platinum');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('P_registration_type')->nullable();
            $table->string('P_title')->nullable();
            $table->string('P_identity_card')->nullable();
            $table->string('P_gender')->nullable();
            $table->string('P_religion')->nullable();
            $table->string('P_race')->nullable();
            $table->string('P_citizenship')->nullable();
            $table->string('P_edu_level')->nullable();
            $table->string('P_edu_field')->nullable();
            $table->string('P_edu_institute')->nullable();
            $table->string('P_occupation')->nullable();
            $table->string('P_sponsorship')->nullable();
            $table->string('P_address')->nullable();
            $table->string('P_phone')->nullable();
            $table->string('P_fb_name')->nullable();
            $table->string('P_program')->nullable();
            $table->integer('P_batch')->nullable();
            $table->boolean('P_referral')->default(false)->nullable();;
            $table->string('P_referral_name')->nullable();
            $table->string('P_referral_batch')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
