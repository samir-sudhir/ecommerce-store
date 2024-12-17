<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('customerNumber')->primary();
            $table->string('customerName');
            $table->string('contactLastName');
            $table->string('contactFirstName');
            $table->string('phone');
            $table->string('addressLine1');
            $table->string('addressLine2')->nullable();
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('country');
            $table->integer('salesRepresentative')->nullable();
            $table->decimal('creditLimit', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
