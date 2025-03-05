<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transcription extends Model
{
    protected $fillable = ['audio_path', 'timestamps'];

    protected $casts = [
        'timestamps' => 'array',
    ];
}
