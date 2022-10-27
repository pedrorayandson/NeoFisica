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
        Schema::create('views', function (Blueprint $table) {
            $table->unsignedBigInteger('views_us_id');
            $table->unsignedBigInteger('views_pub_id');
            $table->foreign('views_us_id')->references('id')->on('users');
            $table->foreign('views_pub_id')->references('pub_id')->on('publicacaos');
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
        Schema::dropIfExists('views');
    }
};
