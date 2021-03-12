@extends('layouts.app')

@section('content')
<h1 class="text-center my-5">Create task</h1>
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card card-default">
      <div class="card-header">
        Create new task
      </div>
      <div class="card-body">
        <form action="/store" method="post">
          <!-- Check for errors -->
          @if ($errors -> any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors -> all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <!-- Generates a token that validates post/delete/put methods -->
          @csrf              
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Task" name="name">
          </div>
          <div class="form-group my-3">
            <textarea name="description" class="form-control" placeholder="Description" cols="5" rows="5"></textarea>
          </div>
          <div class="form-group text-center">
            <input class="btn btn-outline-success" type="submit" value="Create Task">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection