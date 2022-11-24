<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('street');
            $table->string('barangay');
            $table->string('district');
            $table->string('city');
            $table->string('province');
            $table->string('region');
            $table->string('zip');
            $table->string('sex');
            $table->string('civil_status');
            $table->string('tel')->nullable();
            $table->string('mobile');
            $table->string('email');
            $table->string('fax')->nullable();
            $table->string('education');
            $table->string('employment');
            $table->string('dob');
            $table->string('birthplace');
            $table->string('age');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
