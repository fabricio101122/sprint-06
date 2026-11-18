{{--
    Ticket #012 - Card de pergunta com contador de votos e botão de upvote.
    Cole este trecho dentro do loop de perguntas em eventos/show.blade.php,
    adaptando as classes CSS para o estilo do seu projeto.
--}}

@foreach($perguntas as $pergunta)
    @php
        // true se o usuário logado já votou nesta pergunta
        $votou = auth()->check() && $pergunta->votos->contains(auth()->id());
    @endphp

    <div class="card-pergunta {{ $votou ? 'card-votado' : '' }}">
        <p class="conteudo">{{ $pergunta->conteudo }}</p>

        {{-- Quantidade de votos (atributo virtual gerado pelo withCount) --}}
        <span class="votos">{{ $pergunta->votos_count }} votos</span>

        @auth
            <form method="POST" action="{{ route('perguntas.votar', $pergunta) }}">
                @csrf
                {{-- Se já votou, o botão fica destacado indicando que clicar remove o voto --}}
                <button type="submit" class="btn-votar {{ $votou ? 'btn-votado' : '' }}">
                    @if($votou)
                        ★ Votado (clique para remover)
                    @else
                        ☆ Votar
                    @endif
                </button>
            </form>
        @else
            <a href="{{ route('login') }}">Faça login para votar</a>
        @endauth
    </div>
@endforeach
