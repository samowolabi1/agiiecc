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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('serviceid')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('sevicetype_id')->unsigned();
            $table->bigInteger('advert_id')->unsigned();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('status');
            $table->string('approved')->nullable();
            $table->string('measurement')->nullable();
            $table->float('price')->nullable();
            $table->float('discount')->nullable();
            $table->string('product_link')->nullable();
            $table->string('brand')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sevicetype_id')->references('id')->on('sevicetypes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('advert_id')->references('id')->on('adverts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
