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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10);
            $table->integer('feature'); //sp noi bat 
            $table->integer('qty');
            $table->integer('sale_amount'); //da ban
            //foriegn-key
            $table->bigInteger('category_id');
            //$table->foreign('category_id')->references('id')->on('categories');
            $table->bigInteger('manufacture_id');
            //$table->foreign('manufacture_id')->references('id')->on('manufactures');
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
};
