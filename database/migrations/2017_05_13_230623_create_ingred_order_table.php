<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredOrderTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingred_order', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            # `order_id` and `product_id` will be foreign keys, so they have to be unsigned
            $table->integer('order_id')->unsigned();
            $table->integer('ingred_id')->unsigned();
            # Make foreign keys
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('ingred_id')->references('id')->on('ingreds')->onDelete('cascade');       
             });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ingred_order');
    }
}
