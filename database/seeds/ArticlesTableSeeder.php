<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
          'id' => 2,
          'title' => "Polsa stronka webowa",
          'content' => "raz dwa trzy",
          'author' => "Jan Michalski"
        ]);
    }
}
