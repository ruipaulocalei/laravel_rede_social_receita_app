@extends('layouts.app')

@section('buttons')
    @include('ui.navegation')
@endsection

@section('content')
    <h2 class="text-center mb-5">Administre tuas receitas</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Nome</th>
                <th scole="col">Categoria</th>
                <th scole="col">Acções</th>
            </tr>
            </thead>

            <tbody>
            @foreach($receitas as $receita)
                <tr>
                    <td>{{$receita->name}}</td>
                    <td>{{$receita->categoria->name}}</td>
                    <td>
                        <eliminar-receita receita-id="{{$receita->id}}"></eliminar-receita>
                        <a href="{{route('receita.edit', $receita->id)}}" class="btn btn-dark mr-1">Editar</a>
                        <a href="{{route('receita.show', $receita->id)}}" class="btn btn-success mr-1">Ver</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="col-md-12 mt-4 justify-content-center d-flex">
            {{$receitas->links()}}
        </div>

        <h2 class="text-center my-5">Receitas Marcadas como favoritas:</h2>
        <div class="col-md-10 mx-auto bg-white p-3">
            @if (count($user->gosto) > 0)
            <ul class="list-group">
                @foreach ($user->gosto as $receita)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <p> {{$receita->name}} </p>

                        <a class="btn btn-outline-info text-uppercase font-weight-bold" href="{{route('receita.show', $receita->id)}}">Ver</a>
                    </li>
                @endforeach
            </ul>
            @else
                <p class="text-center">Sem receitas favoritas</p>
            @endif
        </div>
    </div>
@endsection
