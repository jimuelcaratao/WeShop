<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id('product_price_id');
            $table->string('product_code', 20)->unique();
            $table->string('price');
            $table->string('discount_type')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('discounted_price')->nullable();
            $table->date('discount_start')->nullable();
            $table->date('discount_end')->nullable();
            $table->timestamps();

            $table->foreign('product_code')->references('product_code')->on('products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_prices');
    }
}
