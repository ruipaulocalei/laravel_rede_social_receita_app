@extends('layouts.app')

@section('content')
    <article class="conteudo-receita bg-white p-5 shadow" >
        <h1 class="text-center mb-4">{{$receita->name}}</h1>

        <div class="imagem-receita">
            <img src="/storage/{{$receita->imagem}}" class="w-100" alt="">
        </div>

        <div class="receita-meta mt-3">
            <p>
                <span class="font-weight-bold text-primary">Categoria:</span>
                <a class="text-info" href="{{route('categorias.show', $receita->categoria->id)}}">
                    {{$receita->categoria->name}}
                </a>
            </p>

            <p>
                <span class="font-weight-bold text-primary">Autor:</span>
                <a class="text-info" href="{{route('perfil.show', $receita->user->id)}}">
                    {{$receita->user->name}}
                </a>
{{--                TODO: mostrar o autor da receita--}}
            </p>

            <p>
                <span class="font-weight-bold text-primary">Data:</span>
                @php
                    $data = $receita->created_at
                @endphp
                <data-receita data="{{$data}}"></data-receita>

            </p>

            <div class="ingredientes">
                <h2 class="my-3 text-primary">Ingredientes</h2>
                {!! $receita->ingredientes !!}
            </div>

            <div class="preparacao">
                <h2 class="my-3 text-primary">Preparação</h2>
                {!! $receita->preparacao !!}
            </div>

            <div class="justify-content-center row text-center">
                <like-button
            receita-id="{{$receita->id}}"
            like="{{$receitaIsLiked}}"
            likes="{{$likesNumber}}"></like-button>
            </div>

        </div>
    </article>
@endsection
