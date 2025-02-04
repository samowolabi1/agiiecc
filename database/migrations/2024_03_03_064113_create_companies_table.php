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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('state_id')->unsigned();
            $table->string('name');
            $table->string('short_description');
            $table->string('phone_number');
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->default('closed');
            $table->string('created_by')->default('system');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->string('tags')->nullable();
            $table->string('shop_link')->nullable();
            $table->string('slogan')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('banner')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();


            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('companies');
    }
};
