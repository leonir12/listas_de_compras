<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemListasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_listas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lista')->unsigned()->nullable();
            $table->foreign('id_lista')->references('id')->on('listas')->cascadeOnDelete();
            $table->integer('id_produto')->unsigned()->nullable();
            $table->foreign('id_produto')->references('id')->on('produtos');
            $table->integer('quantidade')->default(0);
            $table->boolean('ativo')->default(true)->nullable();
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
        Schema::dropIfExists('item_listas');
    }
}
