<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('khName');
            $table->string('enName');
            $table->tinyInteger('gender');
            $table->date('dob');
            $table->string('lob');
            $table->string('address');
            $table->string('phoneNum');
            $table->string('ssid')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('perantNum')->nullable();
            $table->string('photo')->nullable();
            $table->integer('generation_id');
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
        Schema::dropIfExists('students');
    }
}
