<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {

            # Increments method will make a Primary, Auto-Incrementing field.
            # Most tables start off this way
            $table->increments('order_id');
            $table->integer('cid');  //<------- this will need to be a foriegn key
           

            # This generates two columns: `created_at` and `updated_at` to
            # keep track of changes to a row
            $table->timestamps();

            # The rest of the fields...
            $table->string('name');
            $table->string('Email');
            $table->string('order');
            $table->float('price');
            $table->string('phoneNumber');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_orders');

    }
}
