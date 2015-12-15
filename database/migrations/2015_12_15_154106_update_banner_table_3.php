<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBannerTable3 extends Migration
{
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('url');
        });
    }

    public function down()
    {
        //
    }
}
