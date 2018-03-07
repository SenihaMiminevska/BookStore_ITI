<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('is_active');
            $table->string('key');
            $table->string('value');
            $table->timestamps();
        });

        DB::table('languages')->insert([
            ['is_active' => '1', 'key'=> 'en', 'value' => 'English'],
            ['is_active' => '1', 'key'=> 'bg', 'value' => 'Bulgarian'],
            ['is_active' => '1', 'key'=> 'de', 'value' => 'Dutch'],
            ['is_active' => '1', 'key'=> 'ru', 'value' => 'Russian'],
            ['is_active' => '1', 'key'=> 'fr', 'value' => 'French'],
            ['is_active' => '1', 'key'=> 'it', 'value' => 'Italian']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
