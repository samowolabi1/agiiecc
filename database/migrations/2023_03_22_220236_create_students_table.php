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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('file_id');
            $table->unsignedBigInteger('form_id')->default(2);
            $table->string('group');
            $table->string('studentNo')->nullable();
            $table->string('schoollocation')->nullable();
            $table->date('courseStartDate')->nullable();
            $table->string('university')->nullable();
            $table->string('course')->nullable();
            $table->date('courseEndDate')->nullable();
            $table->string('aboutYou')->nullable();
            $table->string('schooltown')->nullable();
            $table->string('postcode')->nullable();
            $table->string('declare')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
        });
    }

    /**
     *  
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
