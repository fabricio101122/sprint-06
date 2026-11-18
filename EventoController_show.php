<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\View\View;

class EventoController extends Controller
{
    /**
     * Ticket #012 - Ranking: pergunta mais votada aparece no topo do telão.
     * withCount('votos') cria o atributo virtual votos_count,
     * e orderByDesc ordena da mais votada para a menos votada.
     */
    public function show(Evento $evento): View
    {
        $perguntas = $evento->perguntas()
            ->withCount('votos')
            ->with('votos:id') // eager load p/ saber se o usuário atual já votou
            ->orderByDesc('votos_count')
            ->get();

        return view('eventos.show', compact('evento', 'perguntas'));
    }
}
