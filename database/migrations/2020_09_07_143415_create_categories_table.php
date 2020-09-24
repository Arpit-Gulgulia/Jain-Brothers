<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) { //Topwear, bottomwear etc
            $table->bigIncrements('category_id');
            $table->bigInteger('person_id');
            $table->bigInteger('parent_id')->default(0);
            $table->string('name');
            $table->string('url');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
