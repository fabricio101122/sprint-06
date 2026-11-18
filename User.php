<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Ticket #010 - Perguntas nas quais o usuário votou (N:M via pivot).
     */
    public function perguntasVotadas(): BelongsToMany
    {
        return $this->belongsToMany(Pergunta::class, 'pergunta_user')->withTimestamps();
    }
}
