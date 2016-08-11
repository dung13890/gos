<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');

            // Main customer information (Thông tin khách hàng)
            $table->string('code', 11)->nullable(); // CMND của khách hàng
            $table->string('name', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('image', 255)->nullable();
            $table->decimal('debt_limit', 10, 3)->nullable(); // Giới hạn nợ của khách hàng.
            $table->unsignedInteger('area_id');
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('user_id'); // Khách hàng của nhân viên kinh doanh nào
            $table->unsignedTinyInteger('type')->nullable();

            // Company infomation
            $table->string('company_name', 200)->nullable();
            $table->string('trading_address', 200)->nullable();
            $table->string('representative', 50)->nullable(); // Người đại diện
            $table->string('tax_code', 32)->nullable();
            $table->string('fax_code', 32)->nullable();
            $table->decimal('receivables', 10, 3)->nullable(); // Nợ phải thu
            $table->decimal('must_pay', 10, 3)->nullable(); // Phải trả
            
            $table->timestamps();
            
            // Indexes or unique
            $table->unique('code');
            $table->unique('email');
            $table->unique('phone');

            $table->foreign('area_id')->references('id')->on('areas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('branch_id')->references('id')->on('branchs')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::drop('customers');
    }
}
