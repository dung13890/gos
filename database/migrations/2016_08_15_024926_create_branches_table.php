<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');

            // Main branches (Thông tin chi nhánh)
            $table->string('code', 11)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('address', 32)->nullable();
            $table->string('fax', 200)->nullable();
            $table->string('website', 200)->nullable();
            $table->string('image', 255)->nullable();
            $table->unsignedTinyInteger('status')->nullable();
            $table->timestamps();

            // Indexes or unique
            $table->unique('code');
            $table->unique('name');
            $table->unique('phone');
            $table->unique('fax', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('branches');
    }
}
