<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $table = 'audio';

    protected $fillable = [
        'file_path',
        'idText',
        'title',
    ];

    public function text()
    {
        return $this->belongsTo(Text::class, 'idText');
    }
}
