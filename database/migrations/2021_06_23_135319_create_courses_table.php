<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programme_id')->constrained();
            $table->string('name');
            $table->string('ante');
            $table->string('nature');
            $table->string('credits');
            $table->smallInteger('year');
            $table->smallInteger('semester');
            $table->smallInteger('sem');
            $table->smallInteger('taught')->default(1);
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
        Schema::dropIfExists('schedule');
    }
}
