@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css"
          integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg=="
          crossorigin="anonymous"/>
@endsection
@section('buttons')
    <a href="{{route('receita.index')}}" class="btn btn-primary mr-2 text-white">Regressar</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Criar nova receita</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{route('receita.store')}}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="name">Nome da receita</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           placeholder="Nome da receita" value="{{old('name')}}">

{{--                    @error('name')--}}
{{--                    <span class="invalid-feedback d-block" role="alert">--}}
{{--                        <strong>{{$message}}</strong>--}}
{{--                    </span>--}}
{{--                    @enderror--}}
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria</label>

                    <select name="categoria" id="categoria"
                            class="form-control @error('categoria') is-invalid @enderror">
                        <option value="">__ Seleccione uma opção</option>
                        @foreach($categorias as $categoria)
                            <option
                                value="{{$categoria->id}}" {{old('categoria') == $categoria->id ? 'selected': ''}}>{{$categoria->name}}</option>
                        @endforeach
                    </select>

                    {{--                    @error('categoria')--}}
                    {{--                    <span class="invalid-feedback d-block" role="alert">--}}
                    {{--                            <strong>Erro</strong>--}}
                    {{--                        </span>--}}
                    {{--                    @enderror--}}

                </div>

                <div class="form-group">
                    <label for="preparacao">Preparação</label>
                    <input type="hidden" name="preparacao" id="preparacao" class="form-control"
                           value="{{old('preparacao')}}">
                    <trix-editor class="form-control @error('preparacao') is-invalid @enderror"
                                 input="preparacao"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="ingrediente">Ingredientes</label>
                    <input type="hidden" name="ingrediente" id="ingrediente" class="form-control"
                           value="{{old('ingrediente')}}">
                    <trix-editor class="form-control @error('ingrediente') is-invalid @enderror"
                                 input="ingrediente"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="imagem">Seleccione uma imagem</label>
                    <input type="file" name="imagem" id="imagem"
                           class="form-control @error('imagem') is-invalid @enderror">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Guardar Receita">
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js"
            integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g=="
            crossorigin="anonymous" defer></script>
@endsection
