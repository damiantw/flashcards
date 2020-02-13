<?php

use Illuminate\Database\Seeder;

class FlashcardsTableSeeder extends Seeder {

	public function run() 
	{
		factory('App\Flashcard', 20)->create();
	}
}