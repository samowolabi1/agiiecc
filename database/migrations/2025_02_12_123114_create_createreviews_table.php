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
        Schema::create('createreviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // FK to Users table
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // FK to Products table
            $table->string('name'); // Reviewer name (optional if user is logged in)
            $table->text('review'); // Review text
            $table->integer('rating')->nullable(); // Rating (1-5)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('createreviews');
    }
};
