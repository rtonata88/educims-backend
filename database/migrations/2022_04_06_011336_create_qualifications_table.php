<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('qualification_code')->nullable();
            $table->string('qualification_name')->nullable();
            $table->string('number_of_years')->nullable();
            $table->string('department_code')->nullable();
            $table->integer('qualification_type_id')->unsigned()->nullable()->index();
            $table->string('qualification_level')->nullable();
            $table->boolean('is_active')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('qualifications');
    }
}
