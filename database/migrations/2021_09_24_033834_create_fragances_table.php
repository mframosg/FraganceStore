<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFragancesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create("fragances", function (Blueprint $table) {
      $table->id();
      $table->string("title");
      $table->string("image");
      $table->string("category");
      $table->string("description");
      $table->double("price");
      $table->unsignedBigInteger("user_id")->nullable();
      $table
        ->foreign("user_id")
        ->references("id")
        ->on("users");
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
    Schema::dropIfExists("fragances");
  }
}
