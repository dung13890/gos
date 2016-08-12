<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('bill_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->string('product_code', 11)->nullable();
            $table->string('product_name', 120)->nullable();
            $table->unsignedInteger('qty')->default(0); // Số lượng
            $table->decimal('price', 10, 3); // Đơn giá
            $table->decimal('promotion', 10, 3)->default(0); // Khuyến mãi
            $table->decimal('into_money', 10, 3)->default(0); // Thành tiền
            $table->unsignedTinyInteger('type')->nullable();
            $table->timestamps();

            $table->foreign('bill_id')->references('id')
                ->on('bills')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')
                ->on('products')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bill_details');
    }
}
