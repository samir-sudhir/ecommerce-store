<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductlinesTable extends Migration
{
    public function up()
    {
        Schema::create('productlines', function (Blueprint $table) {
            $table->string('productLine')->primary();
            $table->text('textDescription')->nullable();
            $table->text('htmlDescription')->nullable();
            $table->binary('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productlines');
    }
}
