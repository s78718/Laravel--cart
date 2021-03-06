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
            $table->bigIncrements('id');
            $table->integer('lotid')->uniqid();//顏色品名編號 不重複
            $table->string('sex');
            $table->string('categroy');
            $table->string('product');
            $table->string('size');//尺寸
            $table->string('color');//顏色
            $table->integer('inventory');//存貨
            $table->string('status');//是否上架
            $table->timestamps();
            $table->index('lotid');

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
