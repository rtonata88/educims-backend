<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('module_code')->nullable();
            $table->string('module_name')->nullable();
            $table->tinyInteger('module_year_level')->nullable();
            $table->integer('department_id')->unsigned()->nullable()->index();
            $table->string('credits')->nullable();
            $table->boolean('has_practical')->nullable();
            $table->tinyInteger('nqf_level')->nullable();
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
        Schema::drop('modules');
    }
}
