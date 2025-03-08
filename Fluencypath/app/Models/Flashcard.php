<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Flashcard extends Model
{
    use HasFactory;

    protected $fillable = ['word', 'sentence_en', 'sentence_pt', 'ipa', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
