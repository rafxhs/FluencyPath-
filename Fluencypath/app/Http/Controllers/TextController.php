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
            'audio_file' => 'required|file',
        ]);

        $text = Text::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'tag' => $request->input('tag'),
            'idUser' => auth()->id(),
        ]);

        $audioFile = $request->file('audio_file');
        $audioData = file_get_contents($audioFile);

        Audio::create([
            'file' => $audioData,
            'idText' => $text->id,
            'title' => $audioFile->getClientOriginalName(),
        ]);

        return redirect()->route('texts.index')->with('success', 'Text and audio uploaded successfully!');
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
        $text = Text::with('audio')->findOrFail($id);
        // $texts = Text::findOrFail($id);
        return view('texts.show', compact('texts'));
    }

    public function destroy($id)
    {
        $text = Text::with('audio')->findOrFail($id);
        // $texts = Text::findOrFail($id);
        $text->delete();

        return redirect()->route('texts.index')->with('success', 'Text and audio deleted successfully!');
    }
}
