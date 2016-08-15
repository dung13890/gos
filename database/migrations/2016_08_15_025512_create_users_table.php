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
            $table->date('birthday');
            $table->string('image')->nullable();
            $table->unsignedTinyInteger('gender')->nullable();
            $table->unsignedInteger('branch_id')->nullable();
            $table->unsignedInteger('position_id')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // Indexes or unique
            $table->unique('email');
            $table->unique('code');
            $table->unique('username');

            $table->foreign('branch_id')->references('id')->on('branches')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
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
