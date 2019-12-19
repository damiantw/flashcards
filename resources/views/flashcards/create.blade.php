@extends ('layout')

@section ('title')
    Add Flashcard
@endsection ('title')

@section ('body')

	<div class="content">
        <div class="title m-b-md">
            Add A Card
        </div>

        <form method="POST" action="/flashcards">
        	@csrf
        	
        	Word:<br>
        	<input type="text" name="word"><br>
        	Definition:<br>
        	<input type="text" name="definition">
        
        	<button type="submit" class="submit-button">Submit</button>

        </form>
    </div>

@endsection ('body')