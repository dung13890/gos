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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            // Main user information
            $table->string('code', 11)->nullable();
            $table->string('username', 50)->nullable();
            $table->string('password', 60)->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 32)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('image')->nullable();
            $table->unsignedTinyInteger('gender')->nullable();
            $table->timestamps();

            // Indexes or unique
            $table->unique('email');
            $table->unique('code');
            $table->unique('username');
            $table->index('username');
            $table->index('phone');
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
