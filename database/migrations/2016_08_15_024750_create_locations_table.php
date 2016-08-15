<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            // Main location information (Khu vực áp dụng kinh doanh)
            $table->string('code', 11)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('description', 200)->nullable();
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
        Schema::drop('locations');
    }
}
