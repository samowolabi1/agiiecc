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
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('form_id')->default(7);
            $table->string('title')->nullable();
            $table->string('fullname')->nullable();
            $table->string('surname')->nullable();
            $table->string('otherName')->nullable();
            $table->string('type')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('pob')->nullable();
            $table->string('addressInNigeria')->nullable();
            $table->string('stateOfOrigin')->nullable();
            $table->string('lga')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('occupation')->nullable();
            $table->string('permanentAddress')->nullable();
            $table->string('country')->nullable();
            $table->string('whereYouReside')->nullable();
            $table->string('postcode')->nullable();
            $table->string('reasonInUk')->nullable();
            $table->string('reasonForRequest')->nullable();
            $table->string('passportNo')->nullable();
            $table->string('dateOfIssue')->nullable();
            $table->string('placeOfIssue')->nullable();
            $table->string('kinSurname')->nullable();
            $table->string('kinOthername')->nullable();
            $table->string('kinGender')->nullable();
            $table->string('kinAddress')->nullable();
            $table->string('kinStateOfOrigin')->nullable();
            $table->string('kinLga')->nullable();
            $table->string('kinPhone')->nullable();
            $table->string('kinEmail')->nullable();
            $table->string('kinOccupation')->nullable();
            $table->string('kinCountry')->nullable();
            $table->string('kinRelationship')->nullable();
            $table->string('kinrefreeName')->nullable();
            $table->string('RefreeAddress')->nullable();
            $table->string('refreeCity')->nullable();
            $table->string('refreePostcode')->nullable();
            $table->string('otherone')->nullable();
            $table->string('othertwo')->nullable();
            $table->string('otherthree')->nullable();

            $table->timestamps();



            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emergencies');
    }
};
