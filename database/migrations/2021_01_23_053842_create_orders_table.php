<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice');
            $table->integer('user_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('zip_code')->nullable();
            $table->text('message')->nullable(); 
            $table->integer('amount')->nullable(); 
            $table->integer('pricewithcoupon')->nullable(); 
            $table->integer('payment_id')->nullable();
            $table->string('transaction_id')->nullable(); 
            $table->string('status')->nullable(); 
            $table->string('currency')->nullable(); 
            $table->timestamps();
        });
    }
   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
