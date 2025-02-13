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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('advertfee_id')->unsigned();
            $table->bigInteger('advert_id')->unsigned();
            $table->bigInteger('payment_id')->unsigned();
            $table->bigInteger('company_id')->unsigned();
            $table->string('item')->nullable();
            $table->integer('item_id')->nullable();
            $table->integer('item_category')->nullable();
            $table->string('cost')->nullable();
            $table->string('amount')->nullable();
            $table->string('quantity')->nullable();
            $table->string('currency')->nullable();
            $table->string('status')->nullable();
            $table->string('description')->nullable();
            $table->string('purpose')->nullable();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('advertfee_id')->references('id')->on('advertfees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('advert_id')->references('id')->on('adverts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
