<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer("quantity");
            $table->double("subTotal");
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->unsignedBigInteger("fragance_id");
            $table->foreign("fragance_id")->references("id")->on("fragances");
            $table->BigInteger("order_id");
            //$table->foreign("order_id")->references("id")->on("orders");
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
        Schema::dropIfExists('items');
    }
}
