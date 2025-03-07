<?php
namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flashcard;
use Illuminate\Support\Facades\Auth;

class FlashcardController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'word' => 'required|string',
            'sentence_en' => 'required|string',
            'pronunciation' => 'nullable|string',
            'translation' => 'required|string',
        ]);

        $word = $request->word;
        $sentence_en = $request->sentence_en;
        $pronunciation = $request->pronunciation ?? '/unknown/';
        $sentence_pt = str_replace($word, $word, $request->translation);

        // Salvar no banco
        Flashcard::create([
            'word' => $word,
            'sentence_en' => str_replace($word, $word, $sentence_en),
            'sentence_pt' => $sentence_pt,
            'ipa' => $pronunciation,
            'user_id' => Auth::id(),
        ]);

        return response()->json(['message' => 'Flashcard adicionado com sucesso!']);
    }

    public function index()
{
    $flashcards = Flashcard::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
    return view('flashcards.index', compact('flashcards'));
}

public function destroy($id)
{
    $flashcard = Flashcard::where('id', $id)->where('user_id', auth()->id())->first();

    if (!$flashcard) {
        return redirect()->route('flashcards.index')->with('error', 'Flashcard não encontrado ou não pertence a você.');
    }

    $flashcard->delete();

    return redirect()->route('flashcards.index')->with('success', 'Flashcard removido com sucesso.');
}


}
