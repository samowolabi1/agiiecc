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
        Schema::create('advertfees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('tenor');
            $table->integer('months');
            $table->integer('days')->nullable();
            $table->integer('cost');
            $table->integer('tax')->nullable();
            $table->integer('charges')->nullable();
            $table->string('benefits')->nullable();
            $table->string('validity')->nullable();
            $table->string('status')->deafult('ACTIVE');
            $table->string('created_by')->default('system');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertfees');
    }
};
