<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdvertiserment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertiserment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('detail');
            $table->date('startDate');
            $table->date('endDate');
            $table->string('image_link');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertiserment');
    }
}
