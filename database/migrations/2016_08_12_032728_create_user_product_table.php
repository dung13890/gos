<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_product', function(Blueprint $table) {
            $table->unsignedInteger('user_id')->default(0);
            $table->unsignedInteger('product_id')->default(0);
            $table->text('content')->nullable(); // Log action user for product
            $table->timestamps();
            $table->primary(['user_id', 'product_id']);
            $table->index(['user_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_product');
    }
}
