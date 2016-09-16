<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
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

            $table->string('code', 11)->nullable();
            $table->string('people_id', 32)->nullable();
            $table->string('name', 120)->nullable();
            $table->char('type', 15)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('phone', 32)->nullable();
            $table->string('fax', 32)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('tax', 100)->nullable();
            $table->string('website', 100)->nullable();
            $table->decimal('liability', 20, 0)->default(0);
            $table->text('note')->nullable();
            $table->json('banks')->nullable();
            
            //Thông tin người liên hệ
            $table->string('user_name_contact', 50)->nullable();
            $table->string('user_phone_contact', 32)->nullable();
            $table->string('user_email_contact', 100)->nullable();

            $table->unsignedInteger('customer_group_id')->nullable();
            $table->foreign('customer_group_id')->references('id')->on('customer_groups')->onDelete('set null');
            
            $table->timestamps();

            // Indexes or unique
            $table->unique(['code', 'people_id', 'name', 'phone']);
            $table->index(['name', 'people_id', 'code', 'phone']);
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
