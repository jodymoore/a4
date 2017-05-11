<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            # Increments method will make a Primary, Auto-Incrementing field.
            # Most tables start off this way
            $table->increments('id');
            $table->integer('user_id')->unsigned();  
           

            # This generates two columns: `created_at` and `updated_at` to
            # keep track of changes to a row
            $table->timestamps();

            # The rest of the fields...
            $table->string('name');
            $table->string('email');
            $table->float('total');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');

    }
}


     /*
     *  updateCart
     */
    public function updateCart() {
        
        // get  cart order id that is to be updated
        $orderId = null;

        $carts = Cart::getContent();

               
         // you may also want to update a product by reducing its quantity, you do this like so:
        Cart::update($orderId, array(
          'quantity' => -1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
        ));

        // get updated contents to show in cart blade
        $cart = Cart::getContent()->toArray();

        return view('cart')->with([
            'carts' => $carts,
        ]);
    }