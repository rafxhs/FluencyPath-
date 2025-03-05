<?php

namespace App\Http\Controllers;
use App\Models\Text;
use App\Models\Audio;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Transcription;

class TextController extends Controller
{
    public function index()
    {
        // $texts = Text::with('audio')->get();
        $texts = Text::all();
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

    // Salva os dados do texto
    $text = Text::create([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'tag' => $request->input('tag'),
        'idUser' => auth()->id(),
    ]);

    // Salva o áudio
    $audioFile = $request->file('audio');
    $filePath = $audioFile->store('audio', 'public'); // Salva em `storage/app/public/audio`

    $audio = Audio::create([
        'idText' => $text->id,
        'file_path' => $filePath,
        'title' => $audioFile->getClientOriginalName(),
    ]);

    // Caminho absoluto do áudio para passar ao script Python
    $absoluteAudioPath = storage_path("app/public/{$filePath}");

    // Caminho do script Python
    $scriptPath = base_path('speech_to_timestamps.py');

    // Executa o script Python
    $process = new Process(["python", $scriptPath, $absoluteAudioPath]);
    $process->run();

    // Verifica erros na execução do script
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }

    // Converte a saída JSON para um array associativo
    $results = json_decode($process->getOutput(), true);

    // Salva os timestamps no banco
    Transcription::create([
        'audio_path' => $filePath,
        'timestamps' => $results,
    ]);

    return redirect()->route('texts.index')->with('success', 'Texto, áudio e transcrição adicionados com sucesso!');
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
        // $text = Text::with('audio')->findOrFail($id);
        // // $texts = Text::findOrFail($id);
        // return view('texts.show', compact('texts'));

        $texts = Text::with('audio')->findOrFail($id);

        return view('texts.show', compact('texts'));
    }

    public function destroy($id)
    {
        $text = Text::findOrFail($id);
        $text->delete();

        return redirect()->route('texts.index')->with('success', 'Text and audio deleted successfully!');
    }
}
