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
        Schema::table('products', function (Blueprint $table) {
            $table->string('reference_number')->nullable();
            $table->string('movement')->nullable();
            $table->string('case_size')->nullable();
            $table->string('case_material')->nullable();
            $table->string('bracelet_material')->nullable();
            $table->string('bracelet_color')->nullable();
            $table->string('water_resistance')->nullable();
            $table->string('other')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
