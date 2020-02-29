<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategroysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categroys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sex');
            $table->string('categroy');
            $table->string('product');
            $table->integer('price');
            $table->string('size');
            $table->string('color');
            $table->integer('inventory');//存貨
            $table->integer('saleprice')->nullable();//特價價錢
            $table->string('salecode')->nullable();//特價碼
            $table->string('status');//狀態
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
        Schema::dropIfExists('categroys');
    }
}
