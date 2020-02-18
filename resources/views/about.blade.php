@extends ('layout')

@section ('title')
    About
@endsection ('title')

@section ('body')
    

        <div class="content">
            <div class="title m-b-md">
                About
            </div>
            <p>The goal of this project is to create a simple application for a customizable deck of flashcards.<br><br>Improvements coming soon include:
            	<ul>
                    <li>
                        Add a factory for flashcard model and seeder.
                    </li>
                    <li>
                        Add tests.
                    </li>
                    <li>
                        Add basic validation error messages.
                    </li>
                    <li>
                        Add flip functionality once card has already been flipped using React.
                    </li>
            		<li>
            			Add link to edit form to cards after they are flipped as well as before.
            		</li>
            		<li>
            			Updated contact link.
            		</li>
            	</ul>
            </p>
        </div>
    
@endsection ('body')