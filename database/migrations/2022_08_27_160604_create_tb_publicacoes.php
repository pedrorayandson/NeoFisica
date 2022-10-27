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
        Schema::create('publicacaos', function (Blueprint $table) {
            $table->id('pub_id');
            $table->string('pub_titulo', 100);
            $table->text('pub_texto');
            $table->binary('pub_img')->nullable();
            $table->unsignedBigInteger('pub_tip_id');
            $table->foreign('pub_tip_id')->references('tip_id')->on('tipos_das_pubs');
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
        Schema::dropIfExists('publicacaos');
    }
};
