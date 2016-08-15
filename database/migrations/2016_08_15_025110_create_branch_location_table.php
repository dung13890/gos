<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_location', function (Blueprint $table) {
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('branch_id');
            $table->timestamps();

            $table->primary(['location_id', 'branch_id']);

            $table->foreign('location_id')->references('id')->on('locations')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('branch_location');
    }
}
