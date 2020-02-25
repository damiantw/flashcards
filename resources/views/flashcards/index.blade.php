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
            <p id="cardFront{{$loop->iteration}}">
                <a href= "{{ route('flashcards.show', ['flashcard' => $flashcard]) }}">The word is {{ $flashcard->word }}.</a>
            </p>
            <button
                type="button"
                onclick='document.getElementById("cardFront{{$loop->iteration}}").
                    innerHTML="The definition is {{ $flashcard->definition }}."  '>Flip Card
            </button>
        @endforeach

    </div>

@endsection ('body')
