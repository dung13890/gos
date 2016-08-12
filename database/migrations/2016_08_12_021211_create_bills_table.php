<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');

            // Main bill infomation
            $table->string('code', 32)->nullable();
            $table->dateTime('date');
            $table->unsignedInteger('user_id')->nullable(); // Hóa đơn được tạo bởi ai
            $table->unsignedInteger('customer_id')->nullable(); // Nhà cung cấp
            $table->unsignedInteger('warehouse_id')->nullable(); // Kho hàng
            $table->unsignedTinyInteger('type')->nullable(); // Loại hóa đơn (nhập hàng hoặc xuất hàng,...)
            $table->text('note')->nullable();

            $table->decimal('total', 10, 3); // Tổng tiền
            $table->decimal('tax_amount', 10, 3)->default(0); // Chịu thuế
            $table->decimal('promotion', 10, 3)->default(0); // Khuyến mãi
            $table->decimal('grand_total', 10, 3); // Tổng phải trả hoặc phải thu
            $table->unsignedTinyInteger('status')->default(0); // Trạng thái hóa đơn

            $table->string('seller_name')->nullable(); // Tên người bán hàng đối với hóa đơn nhập
            $table->string('company_name')->nullable(); // Tên công ty
            $table->string('company_address', 200)->nullable(); // Địa chỉ công ty
            $table->string('tax_code')->nullable(); //Mã số thuế
            $table->string('fax_number')->nullable(); //Số fax
            $table->timestamps();

            $table->unique('code');

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bills');
    }
}
