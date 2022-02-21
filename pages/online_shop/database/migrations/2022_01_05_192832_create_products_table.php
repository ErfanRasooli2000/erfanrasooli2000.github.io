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
            $table->string('title');
            $table->string('full_name');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('sales')->nullable();
            $table->integer('discount');
            $table->text('body')->nullable();
            $table->bigInteger('subcategory_id')->unsigned();
            $table->timestamps();

            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
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
