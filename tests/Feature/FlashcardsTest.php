<?php

namespace Tests\Feature;

use App\Flashcard;
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
        $this->get("/flashcards/{$flashcard->id}")->assertRedirect('login');
        $this->get("/flashcards/{$flashcard->id}/edit")->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_a_flashcard()
    {
        $this->actingAs(factory('App\User')->create());

        $this->get('/flashcards/create')->assertOk();

        $response = $this->post('/flashcards', [
            'word' => $word = $this->faker()->sentence(),
            'definition' => $definition = $this->faker()->paragraph()
        ]);

        $createdFlashcard = Flashcard::query()->first();
        $response->assertRedirect(route('flashcards.show', ['flashcard' => $createdFlashcard]));
        $this->assertEquals($word, $createdFlashcard->word);
        $this->assertEquals($definition, $createdFlashcard->definition);
    }

    /** @test */
    public function a_user_can_view_their_flashcard()
    {
        $this->be($user = factory('App\User')->create());
        $flashcard = factory('App\Flashcard')->create(['user_id' => $user->id]);
        $this->get(route('flashcards.show', ['flashcard' => $flashcard]))
            ->assertOk()
            ->assertSee($flashcard->word)
            ->assertSee($flashcard->definition);
    }

    /** @test */
    public function an_authenticated_user_cannot_view_the_flashcards_of_others()
    {
        $this->be(factory('App\User')->create());
        $flashcard = factory('App\Flashcard')->create();
        $this->get(route('flashcards.show', ['flashcard' => $flashcard]))->assertForbidden();
    }

    /** @test */
    public function a_flashcard_requires_a_word()
    {
        $this->be(factory('App\User')->create());
        $this->post('/flashcards', ['word' => ''])->assertSessionHasErrors('word');
    }

    /** @test */
    public function a_flashcard_requires_a_definition()
    {
        $this->be(factory('App\User')->create());
        $this->post('/flashcards', ['definition' => ''])->assertSessionHasErrors('definition');
    }

    /** @test */
    public function a_user_can_update_an_owned_flashcard()
    {
        //TODO
    }

    /** @test */
    public function a_user_cannot_update_another_users_flashcard()
    {
        //TODO
    }

    /** @test */
    public function a_flashcard_requires_a_unique_word_when_creating()
    {
        //TODO
    }

    /** @test */
    public function a_flashcard_cannot_be_updated_to_use_an_existing_word()
    {
        //TODO
    }

    /** @test */
    public function a_flashcard_can_retain_the_same_word_when_updating()
    {
        //TODO
    }

    /** @test */
    public function a_user_can_delete_an_owned_flashcard()
    {
        //TODO
    }

    /** @test */
    public function a_user_cannot_delete_another_users_flashcard()
    {
        //TODO
    }
}
