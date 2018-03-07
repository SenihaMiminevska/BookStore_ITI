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
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('is_active');
            $table->string('_token');
            $table->string('provider');
            $table->string('email');
            $table->string('title');
            $table->string('author');
            $table->string('genre');
            $table->string('language');
            $table->float('price');
            $table->dateTime('year_of_issue');
            $table->string('publishing_house');
            $table->unsignedBigInteger('EAN');
            $table->unsignedBigInteger('ISBN');
            $table->string('type_cover');
            $table->integer('number_of_pages');
            $table->string('image');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
