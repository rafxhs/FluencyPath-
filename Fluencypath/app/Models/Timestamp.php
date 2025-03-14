<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timestamp extends Model
{
    protected $fillable = [
        'start_time',
        'end_time',
        'word',
        'audio_id',
    ];

//     public function audio(): BelongsTo
// {
//     return $this->belongsTo(Audio::class);
// }
}
