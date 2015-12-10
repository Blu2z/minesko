<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCollectionsGalleryTable extends Migration
{
    public function up()
    {
        Schema::table('collections_gallery', function (Blueprint $table) {
            $table->text('text');
            $table->integer('collection_id')->unsigned()->change();
            $table->foreign('collection_id')->references('id')->on('collections');
        });
    }

    public function down()
    {
        Schema::drop('collections_gallery');
    }
}
