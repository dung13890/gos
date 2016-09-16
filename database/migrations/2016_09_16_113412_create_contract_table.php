<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('code', 11)->nullable();
            $table->string('name', 120)->nullable();
            $table->string('number');
            $table->date('date');
            $table->char('type', 15);
            $table->text('content');

            $table->unsignedInteger('customer_group_id')->nullable();
            $table->foreign('customer_group_id')->references('id')->on('customer_groups')->onDelete('set null');

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->boolean('sent');
            $table->boolean('approved');

            $table->timestamps();
            
            // Indexes or unique
            $table->unique(['code', 'name', 'number']);
            $table->index(['name', 'code', 'number']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contracts');
    }
}
