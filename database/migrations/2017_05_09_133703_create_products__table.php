<?php

use Illuminate\Support\Facades\Schema;
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

        # Increments method will make a Primary, Auto-Incrementing field.
        # Most tables start off this way
        $table->increments('id');
        $table->string('pid');

        # This generates two columns: `created_at` and `updated_at` to
        # keep track of changes to a row
        $table->timestamps();

        # The rest of the fields...
        $table->string('topping');
        $table->string('size');
        $table->string('desc');
        $table->string('image_url');
        $table->float('price');

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
}
