<?php

namespace App\Http\Controllers;

use App\Models\Pergunta;
use Illuminate\Http\RedirectResponse;

class PerguntaController extends Controller
{
    /**
     * Ticket #011 - Alterna o voto do usuário autenticado na pergunta.
     * Se já votou, remove; se não votou, insere (método mágico toggle).
     */
    public function votar(Pergunta $pergunta): RedirectResponse
    {
        $pergunta->votos()->toggle(auth()->id());

        return back()->with('status', 'Seu voto foi atualizado!');
    }
}
