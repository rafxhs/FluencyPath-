<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    use HasFactory;
    protected $table = 'text';

    protected $fillable = [
        'title',
        'content',
        'tag',
        'idUser',
        'likes_count',
    ];

    public function audio()
    {
        return $this->hasOne(Audio::class, 'idText');
    }
}
