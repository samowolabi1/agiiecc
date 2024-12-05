<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('form_id')->default(1);
            $table->string('fullname')->nullable();
            $table->string('maidenName')->nullable();
            $table->string('address')->nullable();
            $table->string('telNo')->nullable();
            $table->string('nationality')->nullable();
            $table->string('country')->nullable();
            $table->string('placeOfBirth')->nullable();
            $table->date('dob')->nullable();
            $table->string('educationStatus')->nullable();
            $table->string('maritalStatus')->nullable();
            $table->string('passportNumber')->nullable();
            $table->date('dateLastResidenceInNig')->nullable();
            $table->string('addressInNig')->nullable();
            $table->string('presentEmployment')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('fatherAddress')->nullable();
            $table->string('fatherOcupation')->nullable();
            $table->string('certificateRequired')->nullable();
            $table->string('other')->nullable();
            $table->string('title')->nullable();
            $table->timestamps();



            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citizens');
    }
};
