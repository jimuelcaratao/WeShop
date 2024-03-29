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
            $table->string('product_code', 20)->primary();
            $table->string('sku', 30)->unique();
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->longText('specs')->nullable();
            $table->string('category_name');
            $table->string('sub_category_name');
            $table->foreignId('brand_id')->nullable();
            $table->string('stock');
            // $table->foreignId('product_price_id');
            $table->text('default_photo')->nullable();
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('brand_id')->references('brand_id')->on('brands');
            // $table->foreign('product_price_id')->references('product_price_id')->on('product_prices');
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
