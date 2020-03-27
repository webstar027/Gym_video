<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGymTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_user', function (Blueprint $table) {

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('gym_id');
            $table->integer('status');
            $table->primary(['user_id', 'gym_id']);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('gym_id')
                ->references('id')
                ->on('gyms')
                ->onDelete('cascade');
                
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
        Schema::dropIfExists('gym_user');
    }
}
