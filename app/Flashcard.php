<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
	protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function path()
    {
    	return "/flashcards/{$this->id}";
    }
}
