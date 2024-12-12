<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('houseNo')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('postcode')->nullable();
            $table->string('stateOfOrigin')->nullable();
            $table->string('forename')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('nigeriaAddress')->nullable();
            $table->string('passportNo')->nullable();
            $table->date('dob')->nullable();
            $table->string('sex')->nullable();
            $table->string('others')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

          
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
