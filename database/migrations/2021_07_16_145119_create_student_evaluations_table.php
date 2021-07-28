<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('course_id')->constrained();
            $table->string('academic_year');
            $table->smallInteger('class_test');
            $table->smallInteger('assignment');
            $table->smallInteger('correction');
            $table->smallInteger('test_returned');
            $table->smallInteger('understanding');
            $table->smallInteger('material_available');
            $table->smallInteger('well_organized');
            $table->smallInteger('recommend');
            $table->smallInteger('meet_expectations');
            $table->smallInteger('helpful');
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
        Schema::dropIfExists('student_evaluations');
    }
}
