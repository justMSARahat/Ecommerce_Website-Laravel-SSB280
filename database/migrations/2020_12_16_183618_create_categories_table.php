<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->integer('is_parent')->default(0)->comment('0 Parent - any value for child');
            $table->string('icon_tag')->nullable();
            $table->integer('is_featured')->default(0)->comment('0=Normal,1=Featured');
            $table->integer('status')->default(0)->comment('0=Pending, 1=active , 2=inactive');
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
        Schema::dropIfExists('categories');
    }
}
