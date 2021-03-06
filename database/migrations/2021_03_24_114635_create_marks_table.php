<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('student_id');
            $table->integer('mark');
            $table->timestamps();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('student_id')->references('id')->on('students');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
