@extends ('layout')

@section ('title')
    Flashcard
@endsection ('title')

@section ('body')

	<div class="content">
        <div class="title m-b-md">
            Flashcard
        </div>

        <div class="links">
            <a href="{{ route('flashcards.edit', ['flashcard' => $flashcard]) }}">Edit Card</a>
        </div>

        <p id="cardFront{{$flashcard->id}}">
            The word is {{ $flashcard->word }}.
        </p>
        <button
            type="button"
            onclick='document.getElementById("cardFront{{$flashcard->id}}").
                innerHTML="The definition is {{ $flashcard->definition }}." '>Flip Card
        </button>


    </div>

@endsection ('body')
