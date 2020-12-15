<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('postcode')->nullable();
            $table->string('firm');
            $table->string('city')->nullable();
            $table->string('email');
            $table->string('country');
            $table->string('street')->nullable();
            $table->string('phone');
            $table->float('price')->nullable()->default(0);
            $table->text('cart')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('orders');
    }
}
