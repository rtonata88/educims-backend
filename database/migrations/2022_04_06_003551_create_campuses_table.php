<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campuses', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('campus_name')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('physical_address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('contact_person')->nullable();
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
        Schema::drop('campuses');
    }
}
