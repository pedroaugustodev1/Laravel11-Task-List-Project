<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;





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


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

Route::fallback(function () {
    return view('still');
 })->name('tasks.notfound');

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success','Task Created Successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success','Task Update Successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task){
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success','Task Deleted Succesfully');
})->name('task.destroy');

Route::put('task/{task}/toggle-complete', function(Task $task) {
    $task->toggleComplete();

    return redirect()->back()->with('success','Task Updated Successfully!');
})->name('tasks.toggle-complete');

// Route::get('/xxx', function () {
//     return 'Hello';
// })->name('hello');

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . '!';
// });

//  Route::get('/', function () use($tasks) {
//      return view('index', [
//          'task' => '$tasks'
//      ]);
//  })->name('index');


// Route::get('/hello', function () {
//     return 'hello';
// });

// Route::fallback(function () {
//     return redirect()->route('index');
// });