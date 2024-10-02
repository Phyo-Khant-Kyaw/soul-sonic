<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumArtistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_artist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')
                  ->references('id')->on('albums')
                  ->onDelete('cascade');
            $table->foreignId('artist_id')
                  ->references('id')->on('artists')
                  ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('album__artist');
    }
}
