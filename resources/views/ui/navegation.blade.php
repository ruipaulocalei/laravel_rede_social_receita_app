<a href="{{route('receita.create')}}" class="btn btn-primary font-weight-bold text-uppercase mr-2 text-white">Criar Receita</a>
<a href="{{route('perfil.edit', Auth::user()->id)}}" class="btn btn-success mr-2 font-weight-bold text-uppercase text-white">Editar Perfil</a>
<a href="{{route('perfil.show', Auth::user()->id)}}" class="btn btn-info mr-2 font-weight-bold text-uppercase text-white">Ver Perfil</a>
