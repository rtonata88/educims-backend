<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQualificationCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualification_campuses', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('academic_year_id')->unsigned()->nullable()->index();
            $table->integer('qualification_id')->unsigned()->nullable()->index();
            $table->integer('study_mode_id')->unsigned()->nullable()->index();
            $table->integer('campus_id')->unsigned()->nullable()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('qualification_campuses');
    }
}
