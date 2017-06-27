<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransMoneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_moneys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type_money');
            $table->string('money');
            $table->integer('wallet_id')->unsigned();
            $table->foreign('wallet_id')->references('id')->on('wallets');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('note')->nullable();
            $table->string('image')->nullable();
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
        Schema::drop('trans_moneys');
    }
}
