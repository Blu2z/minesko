<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotogalleriesGalleryTable extends Migration
{
    public function up()
    {
        Schema::create('photogalleries_gallery', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('photogallery_id');
            $table->boolean('active');
            $table->integer('weight');
            $table->string('img');
            $table->string('alt')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('photogalleries_gallery');
    }
}
