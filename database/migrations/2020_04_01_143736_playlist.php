<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Playlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('gym_id')->unsigned();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('playlist_videos', function (Blueprint $table) {
         
            $table->bigInteger('playlist_id')->unsigned();
            $table->bigInteger('video_id')->unsigned();
            $table->primary(['playlist_id', 'video_id']);

            $table->foreign('playlist_id')
                ->references('id')
                ->on('playlists')
                ->onDelete('cascade');
            
            $table->foreign('video_id')
                ->references('id')
                ->on('videos')
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
        Schema::dropIfExists('playlists');
        Schema::dropIfExists('playlist_videos');
    }
}
