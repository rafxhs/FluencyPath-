<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Favorite extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'text_id'
    ];

    public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}

public function text(): BelongsTo
{
    return $this->belongsTo(Text::class);
}


}
