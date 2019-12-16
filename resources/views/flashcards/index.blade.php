@extends ('layout')

@section ('title')
    Flashcards
@endsection ('title')

@section ('body')
    

        <div class="content">
            <div class="title m-b-md">
                Flashcards
            </div>

            @foreach ($flashcards as $flashcard)
            <p>
            	{{ $flashcard->word }}
            </p>
            @endforeach

        </div>
    
@endsection ('body')