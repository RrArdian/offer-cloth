<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('category_id');
            $table->string('name');
            $table->text('description');
            $table->smallInteger('total_stock');
            $table->float('price_origin', 10, 2);
            $table->float('price_discount', 10, 2);
            $table->smallInteger('discount');
            $table->date('available_from');
            $table->date('available_to');
            $table->enum('status', ['pinned', 'unpinned'])->default('unpinned');
            $table->integer('viewed');
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
        Schema::drop('products');
    }
}
