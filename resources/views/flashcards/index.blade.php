@extends ('layout')

@section ('title')
    Flashcards
@endsection ('title')

@section ('body')
    

        <div class="content">
            <div class="title m-b-md">
                Flashcards
            </div>

            <!-- this works -->
            <!-- <p>
            	{{ $flashcards['card1'] }}
            </p> -->

            @foreach ($flashcards as $key => $value)
            <p>
            	{{ "The card is " . $key . " and the defintion is " . $value }}
            </p>
            @endforeach

        </div>
    
@endsection ('body')