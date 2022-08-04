<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_types', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('exam_type_code')->nullable();
            $table->string('exam_type_name')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exam_types');
    }
}
