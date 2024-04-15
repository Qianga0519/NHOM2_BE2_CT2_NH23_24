<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty');
            $table->decimal('price', 10);
            $table->decimal('discount', 10)->default(0);
            $table->bigInteger('color_id');
            //$table->foreign('color_id')->references('id')->on('product_color');
            $table->bigInteger('order_id');
            //$table->foreign('order_id')->references('id')->on('orders');
            $table->bigInteger('product_id');
            //$table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('order_item');
    }
};
