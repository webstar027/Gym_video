<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('name')->unique();
            $table->string('email',191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->string('gym_name')->nullable();
            // $table->string('gym_address_1')->nullable();
            // $table->string('gym_address_2')->nullable();
            // $table->string('city')->nullable();
            // $table->string('state/province')->nullable();
            // $table->string('country')->nullable();
            // $table->string('zip_code')->nullable();
            // $table->string('wensite')->nullable();
            $table->integer('role_id')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
