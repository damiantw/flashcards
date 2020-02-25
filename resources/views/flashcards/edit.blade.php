@extends ('layout')

@section ('title')
    Edit Flashcard
@endsection ('title')

@section ('body')

	<div class="content">
        <div class="title m-b-md">
            Edit Card
        </div>

        <form method="POST" action="{{ route('flashcards.update', ['flashcard' => $flashcard]) }}">
        	@csrf
            @method('PUT')

        	Word:<br>
        	<input type="text" name="word" value="{{ $flashcard->word }}"><br>
        	Definition:<br>
        	<input type="text" name="definition" value="{{ $flashcard->definition }}">

        	<button type="submit" class="submit-button">Update</button>

        </form>

        <form method="post" action="{{ route('flashcards.destroy', ['flashcard' => $flashcard]) }}">
            @csrf
            @method('DELETE')

            <button type="submit">Delete</button>
        </form>
    </div>

@endsection ('body')
