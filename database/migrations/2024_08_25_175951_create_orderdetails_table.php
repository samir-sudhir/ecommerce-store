<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->integer('orderNumber');
            $table->string('productCode');
            $table->integer('quantityOrdered');
            $table->decimal('priceEach', 10, 2);
            $table->integer('orderLineNumber');

            $table->primary(['orderNumber', 'productCode']);
            $table->foreign('orderNumber')->references('orderNumber')->on('orders')->onDelete('cascade');
            $table->foreign('productCode')->references('productCode')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
}
