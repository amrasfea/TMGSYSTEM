<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id('PB_ID');
            $table->unsignedBigInteger('P_platinumID');
            $table->unsignedBigInteger('M_mentorID')->nullable();
            $table->unsignedBigInteger('ED_ID')->nullable();
            $table->string('PB_Type');
            $table->string('PB_Title');
            $table->string('PB_Author');
            $table->string('PB_Uni');
            $table->string('PB_Course')->nullable();
            $table->integer('PB_Page');
            $table->text('PB_Detail');
            $table->date('PB_Date');
            $table->string('file_path')->nullable();
            $table->timestamps();
            
            $table->foreign('P_platinumID')->references('id')->on('users')->onDelete('cascade');
            // Add foreign keys for Mentor_ID and ED_ID as necessary
            $table->foreign('M_mentorID')->references('M_mentorID')->on('mentors')->onDelete('cascade');
            $table->foreign('ED_ID')->references('ED_ID')->on('expertDomains')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
