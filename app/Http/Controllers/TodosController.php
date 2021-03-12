<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller {

  //Without Route model binding - creates variable $todos and passes as parameters in the -> with()
  public function index() {
    //Get all todos in the DB
    $todos = Todo::all();
    return view('todos.index') -> with('todos', $todos);
  }

  public function show(Todo $todo) {
    return view('todos.show') -> with('todo', $todo);
  }

  public function create() {
    return view('todos.create');
  }

  public function store() {
    //Validates infomation before creating new todo
    $this -> validate(request(), [
      'name' => 'required | min: 6 | max: 50',
      'description' => 'required'
    ]);
    
    //Requests all information apssed by the user
    $data = request()->all();
    $todo = new Todo();
    $todo -> name = $data['name'];
    $todo -> description = $data['description'];
    $todo -> completed = false;
    //Saves to the DB
    $todo -> save();

    //Notifies the user
    session() -> flash('success', 'Task created successfully');

    //Redirect to main page
    return redirect('/todos');
  }

  //With Route model binding - Passes the Todo::find() directly to the -> with()
  public function edit(Todo $todo) {
    return view('todos.edit') -> with('todo', $todo);
  }

  public function update(Todo $todo) {
    //Validates infomation before creating new todo
    $this -> validate(request(), [
      'name' => 'required | min: 6 | max: 50',
      'description' => 'required'
    ]);
    
    //Requests all information apssed by the user
    $data = request() -> all();
    $todo -> name = $data['name'];
    $todo -> description = $data['description'];
    //Saves to the DB
    $todo -> save();

    //Notifies the user
    session() -> flash('success', 'Task updated successfully');

    //Redirect to main page
    return redirect('/todos');
  }

  public function delete(Todo $todo) {
    //Removes the entry from the DB
    $todo -> delete();

    //Notifies the user
    session() -> flash('success', 'Task deleted successfully');

    //Redirect to main page
    return redirect('/todos');
  }

  public function complete(Todo $todo) {
    //Changes the boolean value, by default is created as 'false'
    $todo -> completed = true;

    //Saves to the DB
    $todo -> save();

    //Notifies the user
    session() -> flash('success', 'Task completed successfully');

    //Redirect to main page
    return redirect('/todos');
  }
}