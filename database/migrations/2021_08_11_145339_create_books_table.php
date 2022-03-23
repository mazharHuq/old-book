<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name');
            $table->bigInteger('user_id')->unsigned()->nullable();

            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->string('author');
            $table->text('details');
            $table->string('image');
            $table->string('used');
            $table->string('buy_price');
            $table->string('sell_price');
            $table->boolean('is_sold')->default(false);


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
        Schema::dropIfExists('books');
    }
}
