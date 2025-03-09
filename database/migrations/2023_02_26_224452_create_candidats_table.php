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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->date('date_of_birth');
            $table->enum('gender', ['Female', 'Male', 'Others']);
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->enum('marital_status', ['Single', 'Married', 'Divorced']);
            $table->enum('motorized', ['Yes', 'No']);
            $table->enum('has_driving_license', ['Yes', 'No']);
            $table->enum('has_visa', ['Yes', 'No']);
            $table->string('categorie');
            $table->string('cv_source')->nullable();
            $table->string('cv_upload');
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('candidats');
    }
};
