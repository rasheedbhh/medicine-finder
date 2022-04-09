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
            $table->id();
            $table->integer('quantity');
            $table->integer('total_price');
            $table->foreignId('user_id')->unsigned();
            $table->foreignId('pharmacist_id')->unsigned();
            $table->foreignId('medicine_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pharmacist_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
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
