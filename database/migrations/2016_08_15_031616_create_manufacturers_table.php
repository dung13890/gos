<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->increments('id');

            // Main manufacturer information (Hãng sản xuất)
            $table->string('code', 11)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('description', 200)->nullable();
            $table->string('image', 255)->nullable();
            $table->timestamps();

            // Indexes or unique
            $table->unique('code');
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('manufacturers');
    }
}
