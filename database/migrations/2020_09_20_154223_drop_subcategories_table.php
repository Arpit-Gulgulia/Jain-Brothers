<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('subcategories');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('subcategories', function (Blueprint $table) { //Tshirts, pants, shirts, kurta etc
            $table->bigIncrements('product_subcategory_id');
            $table->bigInteger('product_category_id');
            $table->string('product_subcategory_name');
            $table->timestamps();

            $table->index('product_subcategory_id');
        });
    }
}
