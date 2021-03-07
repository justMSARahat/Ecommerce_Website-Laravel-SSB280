<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->string('top_text');
            $table->text('subtitle');
            $table->string('button_text');
            $table->text('button_text_url');
            $table->text('image');
            $table->integer('slide_type')->default(0)->comment('1->Main Slider,2->Product Slider,3->Product Banner,4->all product');
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
        Schema::dropIfExists('sliders');
    }
}
