<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->string('officeCode')->primary();
            $table->string('city');
            $table->string('phone');
            $table->string('addressLine1');
            $table->string('addressLine2')->nullable();
            $table->string('state')->nullable();
            $table->string('country');
            $table->string('postalCode', 20);  // Increase the length of postalCode
            $table->string('territory');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('offices');
    }
}
