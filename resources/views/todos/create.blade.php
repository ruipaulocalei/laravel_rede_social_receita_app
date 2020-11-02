@extends('layout.app')

@section('content')
    <h1 class="text-center">Create Todos</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Create new todo</div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach($errors->all() as $error)
                                    <li class="list-group-item">
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/store-todos" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" placeholder="name" class="form-control" name="name"/>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Description" class="form-control" rows="10" cols="10"
                                      name="description"></textarea>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Create Todos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
