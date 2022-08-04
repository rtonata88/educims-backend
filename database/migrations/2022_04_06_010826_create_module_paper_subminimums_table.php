<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulePaperSubminimumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_paper_subminimums', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('academic_year_id')->unsigned()->nullable()->index();
            $table->integer('module_id')->unsigned()->nullable()->index();
            $table->integer('exam_type_id')->unsigned()->nullable()->index();
            $table->integer('paper_id')->unsigned()->nullable()->index();
            $table->string('subminimum_mark')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('module_paper_subminimums');
    }
}
