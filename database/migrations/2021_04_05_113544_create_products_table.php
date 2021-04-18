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
            $table->foreignId('brand_id');
            $table->string('stock');
            $table->string('price');
            $table->softDeletes();
            $table->text('default_photo');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('brand_id')->references('brand_id')->on('brands');
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
