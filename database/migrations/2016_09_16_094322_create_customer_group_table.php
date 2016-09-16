<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_groups', function (Blueprint $table) {
            $table->increments('id');
            
            // Main cusotmer - Thông tin khách hàng
            $table->string('code', 11)->nullable();
            $table->string('name', 120)->nullable();
            $table->char('type', 15)->nullable();
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
        Schema::drop('customer_groups');
    }
}
