<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFlashcardRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'word' => ['required', 'max:255' , Rule::unique('flashcards','word')
                ->ignoreModel($this->route('flashcard'))],
            'definition' => ['required', 'max:255']
        ];
    }

    public function word()
    {
        return $this->input('word');
    }

    public function definition()
    {
        return $this->input('definition');
    }
}
