<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('programme_id')->constrained();
            $table->string('student_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->integer('phone');
            $table->string('gender');
            $table->string('enroll_year');
            $table->string('current_academic_year');
            $table->smallInteger('current_semester');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
