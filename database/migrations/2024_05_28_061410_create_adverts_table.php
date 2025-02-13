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
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('advertid')->nullable();
            $table->bigInteger('advertfee_id')->unsigned();
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();            
            $table->string('status')->default('INACTIVE');
            $table->string('approved')->default('No');
            $table->integer('running')->default(0);
            $table->string('comment')->default('NEW');
            $table->integer('frequency')->default(1);
            $table->string('level')->default('LEVEL 1');
            $table->string('paid')->deafult('No');
            $table->string('created_by')->default('system');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('advertfee_id')->references('id')->on('advertfees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adverts');
    }
};
