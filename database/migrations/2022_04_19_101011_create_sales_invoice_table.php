<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_invoice', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('cat_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('discount_id')->unsigned();
            $table->bigInteger('invoice_no')->unique();
            $table->bigInteger('qty');
            $table->bigInteger('amount');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_address');
            $table->timestamps();


            $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('cat_id')
            ->references('id')
            ->on('category')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('discount_id')
            ->references('id')
            ->on('discount')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_invoice');
    }
};
