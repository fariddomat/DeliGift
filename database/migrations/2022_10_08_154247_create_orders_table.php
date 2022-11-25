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
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->unsignedBigInteger("user_id");
            $table->string("details");
            $table->string('price')->nullable();
            $table->string("name");
            $table->string("phone");
            $table->date("delivery_date");
            $table->time("delivery_time");
            $table->string("city");
            $table->string("address");
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('represntative_id')->nullable();
            $table->string('represntative_note')->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable();

            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
