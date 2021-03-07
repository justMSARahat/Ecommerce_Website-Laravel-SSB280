<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('title');
            $table->string('slug');
            $table->text('short_desc')->nullable();
            $table->text('desc')->nullable();
            $table->string('tags')->nullable();
            $table->unsignedInteger('quantity')->default(1);
            $table->integer('reguler_price')->default(0);
            $table->integer('offer_price')->nullable();
            $table->integer('sku_code')->nullable();
            $table->integer('product_type')->default(0)->comment('0=>NEW,0>OLD');
            $table->integer('cat_id');
            $table->integer('brand_id')->nullable();
            $table->integer('is_featured')->default(0)->comment('0=>Normal,1=>featured');
            $table->integer('status')->default(0)->comment('0=>Pending,1=>active,2=>Inactive,3=>Disabled');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('products');
    }
}
