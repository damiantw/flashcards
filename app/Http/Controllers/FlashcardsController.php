<?php

namespace App\Http\Controllers;

use App\Flashcard;
use App\Http\Requests\StoreFlashcardRequest;
use App\Http\Requests\UpdateFlashcardRequest;
use App\Repo\FlashcardRepository;
use Illuminate\Http\Request;

class FlashcardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Flashcard::class, 'flashcard');
    }

    public function index(FlashcardRepository $flashCardRepository, Request $request)
    {
        //need to add pagination back in
        $flashcards = $flashCardRepository->forUser($request->user());
        return view('flashcards/index', ['flashcards' => $flashcards]);
    }

    public function create()
    {
        return view('flashcards/create');
    }

    public function store(FlashcardRepository $flashcardRepo, StoreFlashcardRequest $request)
    {
        $flashcard = $flashcardRepo->create($request->user(), $request->word(), $request->definition());
        return redirect()->route('flashcards.show', ['flashcard' => $flashcard]);
    }

    public function show(Flashcard $flashcard)
    {
        return view('flashcards.show', ['flashcard' => $flashcard]);
    }

    public function edit(Flashcard $flashcard)
    {
        return view('flashcards.edit', ['flashcard' => $flashcard]);
    }

    public function update(FlashcardRepository $flashcardRepo, UpdateFlashcardRequest $request, Flashcard $flashcard)
    {
        $flashcard = $flashcardRepo->update($flashcard, $request->word(), $request->definition());
        return redirect()->route('flashcards.show', ['flashcard' => $flashcard]);
    }

    public function destroy(FlashcardRepository $flashcardRepo, Flashcard $flashcard)
    {
        $flashcardRepo->delete($flashcard);
        return redirect('flashcards.index');
    }
}
