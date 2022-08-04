<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQualificationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualification_types', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('qualification_type')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('qualification_types');
    }
}
