<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WordController extends Controller
{
    private function convertIPAtoBrazilianPronunciation($ipa)
    {
        $map = [
            "æ" => "é",
            "ɑ" => "á",
            "ɔ" => "ó",
            "ʊ" => "u",
            "ɪ" => "i",
            "ʃ" => "x",
            "ð" => "d",
            "θ" => "f",
            "ʒ" => "j",
            "ŋ" => "n",
            "ɚ" => "âr",
            "ɝ" => "âr",
            "eɪ" => "ei",
            "oʊ" => "ou",
            "aɪ" => "ai",
            "aʊ" => "au",
            "ju" => "iu",
            "tʃ" => "tch",
            "dʒ" => "dj",
            "r" => "r",
        ];
        return strtr($ipa, $map);
    }

    public function getWordData($word)
    {
        //  Busca dados da palavra na DictionaryAPI
        $dictionaryResponse = Http::get("https://api.dictionaryapi.dev/api/v2/entries/en/{$word}");

        if ($dictionaryResponse->failed()) {
            return response()->json(['error' => 'Palavra não encontrada'], 404);
        }

        $dictionaryData = $dictionaryResponse->json();
        
        // Pega a primeira pronúncia fonética disponível
        $ipa = '';
        foreach ($dictionaryData[0]['phonetics'] as $phonetic) {
            if (!empty($phonetic['text'])) {
                $ipa = $phonetic['text'];
                break;
            }
        }

        // Converte a pronúncia para o formato brasileiro
        $brazilianPronunciation = $ipa ? $this->convertIPAtoBrazilianPronunciation($ipa) : "Sem pronúncia";
        $audio = $dictionaryData[0]['phonetics'][0]['audio'] ?? '';

        //  Busca a tradução da palavra
        $translationResponse = Http::get("https://api.mymemory.translated.net/get", [
            'q' => $word,
            'langpair' => 'en|pt'
        ]);
        $translationData = $translationResponse->json();
        $translation = $translationData['responseData']['translatedText'] ?? 'Sem tradução';

        return response()->json([
            'word' => $word,
            'pronunciation' => $brazilianPronunciation,
            'audio' => $audio,
            'translation' => $translation
        ]);
    }
}
