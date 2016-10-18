<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGalleryAlbumsContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_albums_content', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('album_id')->unsigned();
            $table->string('locale', 2);
            $table->string('title', 50);
            $table->string('keywords');
            $table->string('description');
            $table->text('text');

            $table->timestamps();

            $table->foreign('album_id')->references('id')->on('gallery_albums')->onDelete('cascade');
            $table->unique(['album_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gallery_albums_content');
    }
}
