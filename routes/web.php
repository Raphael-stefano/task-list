<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get("/", function(){
    return redirect()->route("tasks.index");
});

Route::get('/tasks', function (){
    $tasks = Task::latest('id')->paginate(6);

    return view("tasks/index", [
        'tasks' => $tasks
    ]);
})->name("tasks.index");

Route::get('/tasks/completed', function (){
    $tasks = Task::latest('id')->where('completed', true)->get();

    return view("tasks/index", [
        'tasks' => $tasks
    ]);
})->name("tasks.completed");

Route::view("/tasks/create", "tasks/create")->name("tasks.create");

Route::get("/tasks/{task}/edit", function(Task $task) {
    return view("tasks/edit", [
        'task' => $task
    ]);
})->name("tasks.edit");

Route::get("/tasks/{task}", function(Task $task) {
    return view("tasks/show", [
        'task' => $task
    ]);
})->name("tasks.show");

Route::post('/tasks', function (TaskRequest $request){
    /*$data = $request->validated();

    $task = new Task;

    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'] ?? null;
    $task->save(); */

    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully');

})->name("tasks.store");

Route::put('/tasks/{task}', function (TaskRequest $request, Task $task){
    /*$data = $request->validated();

    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'] ?? null;
    $task->save();*/

    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully');

})->name("tasks.update");

Route::put('/tasks/{task}/toggle-complete', function (Task $task){

    $task->toggleComplete();

    return redirect()->back();

})->name("tasks.toggle-complete");

Route::delete('/tasks/{task}', function (Task $task){

    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully');

})->name("tasks.destroy");



/* Route::get("/hello/{name}", function($name){
    return "Hello {$name}!";
})->name("hello");

Route::get("/hallo", function(){
    return redirect()->route("hello", ['name' => 'world']);
});

Route::fallback(function(){
    return "Still got somewhere";
}); */