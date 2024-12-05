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
        Schema::create('files_losts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('file_id');
            $table->unsignedBiginteger('lost_id');  
            $table->timestamps();

                
            $table->foreign('file_id')->references('id')->on('files')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('lost_id')->references('id')->on('losts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files_losts');
    }
};
