<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_room', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned()->index();
            $table->foreign('permission_id')->references('id')
                ->on('permissions')
                ->onDelete('cascade');
            
            $table->integer('room_id')->unsigned()->index();
            $table->foreign('room_id')->references('id')
                ->on('rooms')
                ->onDelete('cascade');

            $table->primary(['permission_id', 'room_id']);
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
        Schema::drop('permission_room');
    }
}
