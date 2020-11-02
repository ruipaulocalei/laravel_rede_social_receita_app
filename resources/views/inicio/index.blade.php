@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
@endsection

@section('hero')
    <div class="hero-categorias">
        <form action="{{route('buscar.show')}}" class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-4">
                    <p class="display-4 text-black-50">Encontra uma receita</p>
                    <input type="search" name="buscar" class="form-control" placeholder="Buscar Receita">
                </div>
            </div>
        </form>
    </div>
@endsection
@section('content')

    <div class="container">
        <h2 class="titulo-categoria text-uppercase mb-2">Últimas receitas</h2>
        <div class="owl-carousel owl-theme">
            @foreach ($maisRecentes as $maisRecente)
                    <div class="card">
                        <img src="/storage/{{$maisRecente->imagem}}" class="card-img-top" alt="{{$maisRecente->name}}" />
                        <div class="card-body h-100">
                            <h3>{{$maisRecente->name}}</h3>

                            {{-- <p>{{Str::words(strip_tags($maisRecente->preparacao), 10, '') }}</p> --}}
                            <a href="{{route('receita.show', $maisRecente->id)}}" class="btn btn-primary d-block font-weight-bold text-uppercase">Ver Receita</a>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Receitas mais votadas</h2>
        <div class="row">
                @foreach ($votadas as $receita)
                    @include('ui.receita')
                @endforeach
        </div>
        </div>

    @foreach ($receitas as $key => $grupo)
        <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">{{ str_replace('-', ' ', $key)}}</h2>
        <div class="row">
            @foreach ($grupo as $receitas)
                @foreach ($receitas as $receita)
                    @include('ui.receita')
                @endforeach
            @endforeach
        </div>
        </div>
    @endforeach
@endsection
