<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            // Main product information
            $table->string('code', 11)->nullable();
            $table->string('name', 120)->nullable();
            $table->string('model', 50)->nullable();
            $table->string('description', 255)->nullable();
            $table->string('made_in', 100)->nullable();
            $table->string('year_of_production', 8)->nullable();
            $table->date('expir_date')->nullable();
            $table->unsignedInteger('category_id')->nullable(); // Loại sản phẩm
            $table->unsignedInteger('unit_id');
            $table->unsignedInteger('manufacturer_id')->nullable();
            $table->timestamps();

            // Indexes or unique
            $table->unique('code');
            $table->unique('name');
            
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onUpdate('cascade');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
