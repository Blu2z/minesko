<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('firstname', 25)->nullable();
            $table->string('lastname', 25)->nullable();
            $table->timestamp('birth')->nullable();
            $table->integer('role')->default(0);
            $table->boolean('isActive')->default(false)->index();
            $table->string('activationCode');
            $table->string('remember_token', 100)->nullable()->index();
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
        Schema::drop('users');
    }
}
