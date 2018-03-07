<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('is_active');
            $table->string('key');
            $table->string('value');
            $table->timestamps();
        });

        DB::table('genre')->insert([
            ['is_active' => '1', 'key'=> 'literature_fiction', 'value' => 'Literature fiction'],
            ['is_active' => '1', 'key'=> 'bulgarian_literature', 'value' => 'Bulgarian Literature'],
            ['is_active' => '1', 'key'=> 'bulgarian_classic', 'value' => 'Bulgarian classic'],
            ['is_active' => '1', 'key'=> 'world_classics', 'value' => 'World Classics'],
            ['is_active' => '1', 'key'=> 'crime_novels', 'value' => 'Crime novels'],
            ['is_active' => '1', 'key'=> 'fantasy_fantasy_horror', 'value' => 'Fantasy. Fantasy. Horror'],
            ['is_active' => '1', 'key'=> 'love_novels', 'value' => 'Love novels'],
            ['is_active' => '1', 'key'=> 'historical_novels', 'value' => 'Historical novels'],
            ['is_active' => '1', 'key'=> 'humorous_prose', 'value' => 'Humorous prose'],
            ['is_active' => '1', 'key'=> 'roman', 'value' => 'Roman'],
            ['is_active' => '1', 'key'=> 'stories', 'value' => 'Stories'],
            ['is_active' => '1', 'key'=> 'poetry', 'value' => 'Poetry'],
            ['is_active' => '1', 'key'=> 'publicism', 'value' => 'Publicism'],
            ['is_active' => '1', 'key'=> 'biographical_literature', 'value' => 'Biographical literature'],
            ['is_active' => '1', 'key'=> 'biographies', 'value' => 'Biographies'],
            ['is_active' => '1', 'key'=> 'series', 'value' => 'Series'],
            ['is_active' => '1', 'key'=> 'guides', 'value' => 'Guides'],
            ['is_active' => '1', 'key'=> 'culinary', 'value' => 'Culinary'],
            ['is_active' => '1', 'key'=> 'technical_literature', 'value' => 'Technical literature'],
            ['is_active' => '1', 'key'=> 'education', 'value' => 'Education'],
            ['is_active' => '1', 'key'=> 'philosophy', 'value' => 'Philosophy'],

            ['is_active' => '1', 'key'=> 'business_economics', 'value' => 'Business and Economics'],
            ['is_active' => '1', 'key'=> 'health_diets', 'value' => 'Health. Diets'],
            ['is_active' => '1', 'key'=> 'religion_mythology', 'value' => 'Religion and Mythology'],
            ['is_active' => '1', 'key'=> 'dictionaries_phrasebooks', 'value' => 'Dictionaries and Phrasebooks'],
            ['is_active' => '1', 'key'=> 'children_is_literature', 'value' => 'Children is literature']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genres');
    }
}
