<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGalleryImagesContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_images_content', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('image_id')->unsigned();
            $table->string('locale', 2);
            $table->string('title', 50);
            $table->string('keywords');
            $table->string('description');
            $table->text('text');

            $table->timestamps();

            $table->foreign('image_id')->references('id')->on('gallery_images')->onDelete('cascade');
            $table->unique(['image_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gallery_images_content');
    }
}
