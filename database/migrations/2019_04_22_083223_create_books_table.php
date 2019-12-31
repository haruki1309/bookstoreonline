<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 200);
            $table->integer('publisher_id');
            $table->integer('publishing_company_id');
            $table->integer('language_id');
            $table->integer('age_id');
            $table->string('book_cover');
            $table->string('publishing_year');
            $table->string('book_cover_size');
            $table->longText('introduction');
            $table->integer('number_of_pages');
            $table->integer('inventory_number');
            $table->integer('price');
            $table->integer('sale');
            $table->float('rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
}
