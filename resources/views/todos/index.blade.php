@extends('layouts.app')

@section('content')
<h1 class="text-center my-5">TASKIER PHP</h1>
<div class="row justifify-content-center">
  <div class="col-md-8 offset-md-2">
    <div class="card card-default">
      <div class="card-header">
      Todo List
      </div>
      <div class="card-body">
        <ul class="list-group">
          @foreach($todos as $todo)
            <li class="list-group-item">
              {{$todo -> name}}

              @if(!$todo->completed)
                <a href="todos/{{$todo->id}}/complete" class="btn btn-outline-warning btn-sm mx-1 float-end">Complete</a>  
              @endif
              
              <a href="todos/{{$todo->id}}" class="btn btn-outline-primary btn-sm float-end">View</a>     
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection