<?php

namespace App\Policies;

use App\Flashcard;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FlashcardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any flashcards.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the flashcard.
     *
     * @param  \App\User  $user
     * @param  \App\Flashcard  $flashcard
     * @return mixed
     */
    public function view(User $user, Flashcard $flashcard)
    {
        return $user->is($flashcard->user);
    }

    /**
     * Determine whether the user can create flashcards.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the flashcard.
     *
     * @param  \App\User  $user
     * @param  \App\Flashcard  $flashcard
     * @return mixed
     */
    public function update(User $user, Flashcard $flashcard)
    {
        return $user->is($flashcard->user);
    }

    /**
     * Determine whether the user can delete the flashcard.
     *
     * @param  \App\User  $user
     * @param  \App\Flashcard  $flashcard
     * @return mixed
     */
    public function delete(User $user, Flashcard $flashcard)
    {
        return $user->is($flashcard->user);
    }
}
