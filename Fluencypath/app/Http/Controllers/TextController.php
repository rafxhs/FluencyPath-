<?php

namespace App\Http\Controllers;
use App\Models\Text;
use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TextController extends Controller
{
    public function index(Request $request)
    {
        $texts = Text::with('audio')->orderBy('created_at', 'desc')->get();
        // $texts = Text::all();
        $searchbar = $request->input('searchbar');

        $query = Text::with('audio');

        if ($request->has('searchbar')) {
            $query->where(function ($q) use($searchbar){
                $q->where('title', 'like', "%{$searchbar}%")
                      ->orWhere('content', 'like', "%{$searchbar}%")
                      ->orWhere('tag', 'like', "%{$searchbar}%");
            });
        }

        $texts = $query->get();

        $texts = $query->paginate(12);
        return view('texts.index', compact('texts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tag' => 'required|string|max:255',
            'audio' => 'required|file|mimes:mp3,wav,ogg|max:409600',
        ], [
            'audio.required' => 'É necessário anexar um áudio antes de adicionar o texto.',
            'audio.mimes' => 'O arquivo de áudio deve estar no formato MP3, WAV ou OGG.',
            'audio.max' => 'O tamanho máximo permitido para o áudio é de 400MB.',
        ]);

        if (!$request->hasFile('audio')) {
            return redirect()->route('texts.create')->withErrors(['audio' => 'É necessário anexar um áudio antes de adicionar o texto.']);
        }

        $text = Text::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'tag' => $request->input('tag'),
            'idUser' => auth()->id(),
        ]);

        $audioFile = $request->file('audio');
        $filePath = $audioFile->store('audio', 'public');

        Audio::create([
            'idText' => $text->id,
            'file_path' => $filePath,
            'title' => $audioFile->getClientOriginalName(),
        ]);

        return redirect()->route('texts.index')->with('success', 'Texto e áudio adicionados com sucesso!');
    }

    public function create()
    {
        return view('texts.create');
    }

    public function edit($id)
    {
        $text = Text::findOrFail($id);
        return view('texts.edit', compact('text'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tag' => 'required|string|max:255',
        ]);

        $text = Text::findOrFail($id);
        $text->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'tag' => $request->input('tag'),
        ]);

        return redirect()->route('texts.index')->with('success', 'Texto e  áudio atualizados com sucesso!');
    }

    public function show($id)
    {
        $texts = Text::with('audio')->findOrFail($id);
        return view('texts.show', compact('texts'));
    }

    public function destroy($id)
    {
        $text = Text::with('audio')->findOrFail($id);

        if ($text->audio) {
            Storage::disk('public')->delete($text->audio->file_path);
            $text->audio->delete();
        }

        $text->delete();

        return redirect()->route('texts.index')->with('success', 'Texto e áudio excluídos com sucesso!');
    }
}
