<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestLogsTable extends Migration
{
    public function up()
{
    Schema::create('request_logs', function (Blueprint $table) {
        $table->id();
        $table->string('method');
        $table->string('url');
        $table->text('request_data')->nullable();
        $table->integer('status_code')->default(200);
        $table->text('response_data')->nullable();
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('request_logs');
    }
}
