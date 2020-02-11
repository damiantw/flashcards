<?php

namespace App\Http\Controllers;

use App\Flashcard;
use Illuminate\Http\Request;

class FlashcardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //need to add pagination back in
        $flashcards = \App\Flashcard::where('user_id', auth()->user()->id)->get();

        return view('flashcards/index', compact('flashcards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flashcards/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateFlashcard();
        $flashcard = new \App\Flashcard();
        $flashcard->word = $request->word;
        $flashcard->definition = $request->definition;
        $flashcard->user_id = auth()->user()->id;
        $flashcard->save();

        return redirect('flashcards');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('flashcards.show', ['flashcard' => Flashcard::findOrFail($id)]);      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Flashcard $flashcard)
    {
        return view('flashcards.edit', compact('flashcard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // you want to overwrite the data for the flashcard 
        request()->validate([
            'word' => 'required|max:255',
            'definition' => 'required|max:255'
        ]);
        $flashcard = Flashcard::findOrFail($id);

        $flashcard->word = $request->word;
        $flashcard->definition = $request->definition;
        $flashcard->user_id = auth()->user()->id;
        $flashcard->save();
        return redirect()->route('flashcards.show', [$flashcard]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Flashcard::where('id', $id)->delete();
        return redirect('flashcards');
    }

    public function validateFlashcard()
    {
        return request()->validate([
            'word' => 'required|max:255|unique:flashcards',
            'definition' => 'required|max:255'
        ]);
    }
}
