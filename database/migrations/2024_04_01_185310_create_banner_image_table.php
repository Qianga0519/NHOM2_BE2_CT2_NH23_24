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
        Schema::create('banner_image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->unsignedBigInteger('banner_id');
            $table->foreign('banner_id')->references('id')->on('banners');
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
        Schema::dropIfExists('banner_image');
    }
};
