<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Text extends Model
{
    use HasFactory;

    // Campos que podem ser atribuídos em massa
    protected $fillable = [
        'title',
        'content',
        'tag',
        'idUser',
        'favorites_count'
    ];

    /**
     * Relacionamento com os usuários que possuem textos
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }


    /**
     * Relacionamento com os usuários que favoritaram o texto
     */
    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'text_id', 'user_id');
    }

    public function audio()
    {
        return $this->hasOne(Audio::class, 'idText');
    }

    /**
     * Eventos do modelo para inicializar ou ajustar o campo `favorites_count`
     */
    protected static function boot()
    {
        parent::boot();

        // Define `favorites_count` como 0 ao criar um novo texto
        static::creating(function ($text) {
            $text->favorites_count = $text->favorites_count ?? 0;
        });

        // Redefine `favorites_count` para 0 ao deletar o texto (se necessário)
        static::deleted(function ($text) {
            $text->favorites_count = 0;
        });
    }
}
