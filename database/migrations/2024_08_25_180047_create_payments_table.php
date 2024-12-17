<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->integer('customerNumber');
            $table->string('checkNumber');
            $table->date('paymentDate');
            $table->decimal('amount', 10, 2);
            $table->timestamps();

            $table->primary(['customerNumber', 'checkNumber']);

            // Foreign key for customerNumber
            $table->foreign('customerNumber')->references('customerNumber')->on('customers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
