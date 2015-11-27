<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('alias', 255);
            $table->string('title', 255);
            $table->string('keywords', 100)->nullable();
            $table->string('description', 150)->nullable();
            $table->string('img', 255)->nullable();
            $table->string('alt', 255)->nullable();
            $table->text('text');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('news');
    }
}
