<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFraganceWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fragance_wishlists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("wishlist_id");
            $table->foreign("wishlist_id")->references("id")->on("wish_lists");
            $table->unsignedBigInteger("fragance_id");
            $table->foreign("fragance_id")->references("id")->on("fragances");
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
        Schema::dropIfExists('fragance_wishlists');
    }
}
