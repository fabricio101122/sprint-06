<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pergunta extends Model
{
    // Ajuste o $fillable conforme os campos que já existem no seu projeto
    protected $fillable = [
        'conteudo',
        'evento_id',
        'user_id',
    ];

    /**
     * Ticket #010 - Usuários que votaram nesta pergunta (N:M via pivot).
     */
    public function votos(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
