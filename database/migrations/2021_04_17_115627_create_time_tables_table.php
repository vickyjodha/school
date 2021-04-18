<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_tables', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedBigInteger("teacher_id");
            $table->unsignedBigInteger("subject_id");
            $table->char("class_day");
            $table->time("from_timing");
            $table->time("to_timing");
            $table->boolean("is_lunch")->nullable();
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('users');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_tables');
    }
}
