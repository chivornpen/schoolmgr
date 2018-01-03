<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('gender');
            $table->string('address');
            $table->string('phoneNum',50);
            $table->string('email')->nullable()->unique();
            $table->string('education');
            $table->double('salaryPerMonth')->nullable();
            $table->double('salaryPerHour')->nullable();
            $table->integer('user_id');
            $table->integer('authorize_id')->nullable();
            $table->date('authorize_date')->nullable();
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('teachers');
    }
}
