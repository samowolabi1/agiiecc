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
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('ridetype_id')->unsigned();
            $table->bigInteger('advert_id')->unsigned();
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('color_id')->unsigned()->nullable();
            $table->bigInteger('carbrand_id')->unsigned()->nullable();
            $table->bigInteger('cartype_id')->unsigned()->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->longText('short_description')->nullable();
            $table->longText('next_of_kin_name')->nullable();
            $table->longText('next_of_kin_address')->nullable();
            $table->longText('next_of_kin_phone_number')->nullable();
            $table->longText('spouse_name')->nullable();
            $table->longText('spouse_address')->nullable();
            $table->longText('spouse_phone_number')->nullable();
            $table->longText('car_plate_number')->nullable();
            $table->longText('car_engine_number')->nullable();
            $table->longText('license_number')->nullable();
            $table->longText('full_Address')->nullable();
            $table->string('status');
            $table->string('approved')->nullable();
            $table->float('price')->nullable();
            $table->float('discount')->nullable();
            $table->string('service_link')->nullable();
            $table->string('brand')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ridetype_id')->references('id')->on('ridetypes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('advert_id')->references('id')->on('adverts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('carbrand_id')->references('id')->on('carbrands')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cartype_id')->references('id')->on('cartypes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rides');
    }
};
