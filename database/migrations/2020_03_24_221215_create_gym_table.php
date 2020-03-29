<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGymTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gyms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gym_name');
            $table->string('gym_address_1');
            $table->string('gym_address_2')->nullable();
            $table->string('city');
            $table->string('state_province');
            $table->string('country');
            $table->string('zip_code');
            $table->string('website')->nullable();
            $table->bigInteger('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');;
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
        Schema::dropIfExists('gyms');
    }
}
