@extends('layout.app')

@section('title')
    Single List:
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center my-5">
                {{$todo->name}}
            </h1>

            <div class="card card-default">
                Details
            </div>

            <div class="card-body">
                {{$todo->description}}
            </div>
            <a href="/todos/{{$todo->id}}/edit" class="btn btn-info">Edit</a>
            <a href="/todos/{{$todo->id}}/delete" class="btn btn-danger">Delete</a>
        </div>
    </div>
@endsection
