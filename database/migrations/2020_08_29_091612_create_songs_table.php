<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('photo');
            $table->longText('file');
            $table->foreignId('artist_id')
                  ->references('id')->on('artists')
                  ->onDelete('cascade');


                $table->foreignId('album_id')
                  ->references('id')->on('albums')
                  ->onDelete('cascade');
 

                $table->foreignId('category_id')
                  ->references('id')->on('categories')
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
        Schema::dropIfExists('song');
    }
}
