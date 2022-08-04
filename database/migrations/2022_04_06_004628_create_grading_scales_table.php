<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradingScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grading_scales', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('academic_year_id')->unsigned()->nullable()->index();
            $table->integer('exam_type_id')->unsigned()->nullable()->index();
            $table->string('symbol')->nullable();
            $table->string('minimum_mark')->nullable();
            $table->string('maximum_mark')->nullable();
            $table->string('academic_result')->nullable();
            $table->string('result_description')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grading_scales');
    }
}
