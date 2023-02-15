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
            $table->string('name');
            $table->double('price');
            $table->double('offer');
            $table->string('description')->nullable();
            $table->string('short_description')->nullable();
            $table->string('model_name')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('brand_id')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->tinyInteger('status');
            $table->tinyInteger('stock');
            $table->string('images');
            $table->string('details')->nullable();;
            $table->string('slug')->unique();
            $table->tinyInteger('is_feature')->default('0');
            $table->integer('views')->default(0);
            $table->timestamp('deleted_at')->nullable();
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
