<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsGallery extends Migration
{
    public function up()
    {
        Schema::create('news_gallery', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('news_id')->unsigned();
            $table->boolean('active');
            $table->integer('weight');
            $table->string('img');
            $table->string('alt')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('news_id')->references('id')->on('news');
        });
    }

    public function down()
    {
        Schema::drop('news_gallery');
    }
}
