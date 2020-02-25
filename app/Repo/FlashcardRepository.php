<?php


namespace App\Repo;


use App\Flashcard;
use App\User;
use Illuminate\Database\Eloquent\Collection;

class FlashcardRepository
{
    public function forUser(User $user): Collection
    {
        return $user->flashcards()->get();
    }

    public function create(User $user, string $word, string $definition): Flashcard
    {
        return $user->flashcards()->create(['word' => $word, 'definition' => $definition]);
    }

    public function update(Flashcard $flashcard, string $word, string $definition): Flashcard
    {
        $flashcard->update(['word' => $word, 'definition' => $definition]);
        return $flashcard;
    }

    public function delete(Flashcard $flashcard): bool
    {
        return $flashcard->delete();
    }
}
