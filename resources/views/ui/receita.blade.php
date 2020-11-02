<div class="col-md-4 mt-4">
    <div class="card shadow">
    <img src="/storage/{{$receita->imagem}}" class="card-img-top" alt="{{$receita->name}}" />
    <div class="card-body">
        <h3 class="card-title">{{$receita->name}}</h3>

        <div class="meta-receita d-flex justify-content-between">
            @php
                $data = $receita->created_at
            @endphp
            <p class="text-primary data font-weight-bold">
                <data-receita data="{{$data}}"></data-receita>
            </p>

            <p class="text-primary">{{count($receita->likes)}} Gostos</p>
        </div>

        {{-- <p> {{Str::words(strip_tags($maisRecente->preparacao), 20, '...') }} </p> --}}
        <a href="{{route('receita.show', $receita->id)}}" class="btn btn-primary d-block btn-receita">Ver Receita</a>
    </div>
    </div>
</div>
