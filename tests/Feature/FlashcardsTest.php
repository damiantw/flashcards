<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FlashcardsTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /** @test */
    public function guests_can_access_non_resource_views()
    {
        $this->get('/')
            ->assertSee('Home');
        $this->get('/')
            ->assertSee('About');
        $this->get('/')
            ->assertSee('Contact');
    }

    /** @test */
    public function guests_cannot_access_flashcard_views()
    {
        $flashcard = factory('App\Flashcard')->create();

        $this->get('/flashcards')->assertRedirect('login');
        $this->get('/flashcards/create')->assertRedirect('login');
        $this->get('/flashcards/{$flashcard->id}')->assertRedirect('login');
        $this->get('/flashcards/{$flashcard->id}/edit')->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_a_flashcard()
    {        
        $this->actingAs(factory('App\User')->create());
        
        $this->get('/flashcards/create')->assertStatus(200);

        $attributes = [
            'word' => $this->faker()->sentence(),
            'definition' => $this->faker()->paragraph()
        ];

        $this->post('/flashcards', $attributes)->assertRedirect('/flashcards');

        $this->assertDatabaseHas('flashcards', $attributes);
    }

    /** @test */
    public function a_user_can_view_their_flashcard()
    {
        $this->be(factory('App\User')->create());

        $flashcard = factory('App\Flashcard')->create();

        $this->get($flashcard->path())
            ->assertSee($flashcard->title)
            ->assertSee($flashcard->description);
    }

    /** @test */
    public function an_authenticated_user_cannot_view_the_flashcards_of_others()
    {
        $this->be(factory('App\User')->create());

        $flashcard = factory('App\Flashcard')->create();

        $this->get($flashcard->path())->assertStatus(403);
    }

    /** @test */
    public function a_flashcard_requires_a_word()
    {
        $this->be(factory('App\User')->create());
        $attributes = factory('App\Flashcard')->raw(['word' => '']);

        $this->post('/flashcards', $attributes)->assertSessionHasErrors('word');
    }

    /** @test */
    public function a_flashcard_requires_a_definition()
    {
        $this->be(factory('App\User')->create());
        $attributes = factory('App\Flashcard')->raw(['definition' => '']);

        $this->post('/flashcards', $attributes)->assertSessionHasErrors('definition');
    }



}
