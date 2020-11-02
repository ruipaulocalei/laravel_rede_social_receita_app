@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Resultados de: {{$busca}}</h2>

        <div class="row">
            @foreach ($receitas as $receita)
                @include('ui.receita')
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{$receitas->links()}}
        </div>
    </div>
@endsection
