@extends ('layout')

@section ('title')
    Add Flashcard
@endsection ('title')

@section ('body')

	<div class="content">
        <div class="title m-b-md">
            Add A Card
        </div>

        <p>Here is where we want a form to add a card with a word and a definition, 
        	connected to the db, with a submit button that links it back.
        </p>

        <form method="POST" action="/flashcards">
        	@csrf
        	
        	Word:<br>
        	<input type="text" name="word"><br>
        	Definition:<br>
        	<input type="text" name="definition">
        
        	<button type="submit">Submit</button>

        </form>
    </div>

@endsection ('body')