@extends('layout.app')
@section('title')
    Todos List
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Todos
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($todos as $todo)
                            <li class="list-group-item">
                                {{$todo->name}}
                               @if(!$todo->completed)
                                    <a href="/todos/{{$todo->id}}/complete" style="color: white;" class="btn btn-warning btn-sm float-right ml-2">COMPLETE</a>
                                @endif
                                <a href="/todos/{{$todo->id}}" class="btn btn-primary btn-sm float-right">VIEW</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
