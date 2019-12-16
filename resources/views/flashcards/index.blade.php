@extends ('layout')

@section ('title')
    Flashcards
@endsection ('title')

@section ('body')
    
    <div class="content">
        <div class="title m-b-md">
            Flashcards
        </div>

        <div class="links">
            <a href="flashcards/create">Add a card</a>
        </div>

        @foreach ($flashcards as $flashcard)
        <p>
        	{{ " The word is " . $flashcard->word . " and the definition is " . $flashcard->definition . "." }}
        </p>
        @endforeach

    </div>
    
@endsection ('body')