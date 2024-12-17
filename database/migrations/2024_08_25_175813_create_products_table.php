<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('productCode')->primary();
            $table->string('productName');
            $table->string('productLine');
            $table->string('productScale');
            $table->string('productVendor');
            $table->text('productDescription');
            $table->integer('quantityInStock');
            $table->decimal('buyPrice', 10, 2);
            $table->decimal('MSRP', 10, 2);
             // Foreign key for productLine
        $table->foreign('productLine')->references('productLine')->on('productlines')->onDelete('cascade');
            $table->timestamps();

           

        });

    //     Schema::table('products', function (Blueprint $table) {  
    //     $table->foreign('productLine')->references('productLine')->on('productlines')->onDelete('cascade');
    // });
    }
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
