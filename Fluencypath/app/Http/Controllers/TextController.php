<?php

namespace App\Http\Controllers;
use App\Models\Text;
use App\Models\Audio;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index()
    {
        $texts = Text::with('audio')->get();
        // $texts = Text::all();
        return view('texts.index', compact('texts'));
    }

    public function create()
    {
        return view('texts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tag' => 'required|string|max:255',
            'audio' => 'required|file|mimes:mp3,wav,ogg|max:409600',
        ]);

        $text = Text::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'tag' => $request->input('tag'),
            'idUser' => auth()->id(),
        ]);


        $audioFile = $request->file('audio');
        $filePath = $audioFile->store('audio', 'public'); // Salva em `storage/app/public/audio`

        Audio::create([
            'idText' => $text->id,
            'file_path' => $filePath,
            'title' => $audioFile->getClientOriginalName(),
        ]);

        return redirect()->route('texts.index')->with('success', 'Texto e áudio adicionados com sucesso!');


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

        return redirect()->route('texts.index')->with('success', 'Text and audio updated successfully!');
    }

    public function show($id)
    {
        $texts = Text::with('audio')->findOrFail($id);
        return view('texts.show', compact('texts'));
    }

    public function destroy($id)
    {
        $text = Text::with('audio')->findOrFail($id);
        $text->delete();

        return redirect()->route('texts.index')->with('success', 'Text and audio deleted successfully!');
    }
}
