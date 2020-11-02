@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if ($perfil->imagem)
                    <img src="/storage/{{$perfil->imagem}}" class="w-40 rounded-circle" height="250" width="250" alt="imagem do chefe">
                @endif
            </div>
            <div class="col-md-7">
                <h2 class="text-center mb-2 mt-5 mt-md-0 text-primary">{{$perfil->user->name}}</h2>
                <div class="biografia">
                    {!! $perfil->biografia !!}
                </div>
            </div>
        </div>
    </div>

<h2 class="text-center my-5">Receitas criadas por: {{$perfil->user->name}}</h2>
<div class="container">
    <div class="row mx-auto bg-white p-4">
        @if (count($receitas) > 0)
            @foreach ($receitas as $receita)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="/storage/{{$receita->imagem}}" class="card-img-top" alt="{{$receita->name}}">
                        <div class="card-body">
                            <h3>{{$receita->name}}</h3>

                            <a href="{{route('receita.show', $receita->id)}}" class="btn btn-primary d-block mt-4 text-uppercase font-weight-bold">Ver Receita</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center w-100">Sem receitas por enquanto</div>
        @endif

    </div>
    <div class="d-flex justify-content-center">
        {{$receitas->links()}}
    </div>
</div>
@endsection


