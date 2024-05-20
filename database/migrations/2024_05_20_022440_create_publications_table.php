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
        Schema::create('publications', function (Blueprint $table) {
            $table->bigIncrements('PB_ID');
            $table->unsignedBigInteger('ED_ID');
            $table->foreign('ED_ID')->references('ED_ID')->on('expertDomains');
            $table->string('PB_Type');
            $table->string('PB_Title');
            $table->string('PB_Author');
            $table->string('PB_Uni');
            $table->string('PB_Course');
            $table->string('PB_Keyword');
            $table->date('PB_Date');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('platinums');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
