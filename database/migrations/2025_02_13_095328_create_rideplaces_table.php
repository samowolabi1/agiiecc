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
        Schema::create('rideplaces', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('ride_id')->unsigned();
            $table->string('city');
            $table->timestamps();



            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ride_id')->references('id')->on('rides')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rideplaces');
    }
};
