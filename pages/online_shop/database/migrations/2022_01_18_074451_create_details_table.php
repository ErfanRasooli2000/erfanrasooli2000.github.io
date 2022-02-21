<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->bigInteger('subcategory_id')->unsigned();
            $table->timestamps();

            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
        });

        Schema::create('detail_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value');
            $table->unsignedBigInteger('detail_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->foreign('detail_id')->references('id')->on('details')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_product');
        Schema::dropIfExists('details');
    }
}
