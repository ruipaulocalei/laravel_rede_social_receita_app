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
    <div class="text-center">Editar Meu Perfil</div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">
            <form action="{{route('perfil.update', $perfil->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control"
                           placeholder="Teu nome"
                value="{{$perfil->user->name}}"
                           />
                </div>

                <div class="form-group">
                    <label for="biografia">Biografia</label>
                    <input type="hidden" name="biografia" id="biografia" class="form-control" value="{{$perfil->biografia}}"/>
                    <trix-editor class="form-control @error('biografia') is-invalid @enderror"
                                 input="biografia"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="imagem">Seleccione uma imagem</label>
                    <input type="file" name="imagem" id="imagem"
                           class="form-control">

                    @if($perfil->imagem)
                        <div class="mt-4">
                            <p>Imagem Actual</p>
                               <img src="/storage/{{$perfil->imagem}}" style="width: 300px" />
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar Perfil">
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
