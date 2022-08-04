<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAcademicYearLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_year_levels', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->tinyInteger('year_level')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('academic_year_levels');
    }
}
