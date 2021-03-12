@extends('layouts.app')

@section('content')
<h1 class="text-center my-5">{{$todo -> name}}</h1>
  <div class="card card-default">
    <div class="card-header">
      Details
    </div>
    <div class="card-body">
      {{$todo -> description}}
    </div>
  </div>
  <a href="/todos/{{$todo->id}}/edit"class="btn btn-outline-secondary my-3">Edit</a>
  <a href="/todos/{{$todo->id}}/delete"class="btn btn-outline-danger my-3">Delete</a>
@endsection