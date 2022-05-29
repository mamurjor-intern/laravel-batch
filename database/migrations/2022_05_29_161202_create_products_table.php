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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('sku');
            $table->text('short_desc');
            $table->longText('long_desc');
            $table->string('feature_image');
            $table->longText('gallery_image')->nullable();
            $table->integer('qty');
            $table->float('price');
            $table->float('discount_price')->nullable();
            $table->text('color')->nullable();
            $table->text('size')->nullable();
            $table->integer('is_approved')->default(0);
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
        Schema::dropIfExists('products');
    }
};
