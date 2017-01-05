<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cards', function (Blueprint $table) {
          $table->increments('id');
          $table->bigInteger('user_id')->unsigned();
          $table->bigInteger('category_id')->unsigned();
          $table->text('front');
          $table->text('back');
          $table->boolean('known')->default(0);
          $table->timestamps();
          $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
          $table->foreign('category_id')
                ->references('id')->on('category')
                ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('cards');
    }
}
