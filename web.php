<?php

use App\Http\Controllers\PerguntaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Ticket #011 - Rota de voto com alternância (toggle)
|--------------------------------------------------------------------------
| POST /perguntas/{pergunta}/votar  ->  PerguntaController@votar
| Protegida por autenticação e nomeada "perguntas.votar".
*/
Route::post('/perguntas/{pergunta}/votar', [PerguntaController::class, 'votar'])
    ->name('perguntas.votar')
    ->middleware('auth');
