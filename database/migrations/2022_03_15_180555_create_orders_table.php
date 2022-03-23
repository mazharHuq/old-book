<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->id();
            $table->string('name')->nullable();
            $table->string('email',30)->nullable();
            $table->string('phone',20)->nullable();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('amount')->nullable();


            $table->text('address')->nullable();
            $table->string('status',10)->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency',20)->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
