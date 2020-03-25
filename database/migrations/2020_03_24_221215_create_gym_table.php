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
        Schema::create('gym', function (Blueprint $table) {
            $table->id();
            $table->string('gym_name');
            $table->string('gym_img')->nullable();
            $table->string('gym_address');
            $table->string('description')->nullable();
            $table->string('videos')->nullable();
            $table->integer('gym_ownner_id');
            $table->timestamps('added_on');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gym');
    }
}
