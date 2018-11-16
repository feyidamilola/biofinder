<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBioproductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bioproduct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->string('category_name');
            $table->string('vendor_name');
            $table->float('price');
            $table->string('product_type');
            $table->string('product_application');
            $table->string('description');
            $table->string('url');
            $table->string('image');
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
        Schema::dropIfExists('bioproduct');
    }
}
