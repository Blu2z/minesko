<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePhotogalleriesGalleryTable extends Migration
{
    public function up()
    {
        Schema::table('photogalleries_gallery', function (Blueprint $table) {
            $table->text('text');
            $table->integer('photogallery_id')->unsigned()->change();
            $table->foreign('photogallery_id')->references('id')->on('photogalleries');
        });
    }

    public function down()
    {
        Schema::drop('photogalleries_gallery');
    }
}
