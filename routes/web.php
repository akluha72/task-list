<?php

use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskRequest;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

//Route list of all task
Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');

//Route Create a new Task
Route::view('/tasks/create', 'create')->name('tasks.create');

// Route to display one single task
Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

// Route to display edit task layout
Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

// Route to submit the form / create task
Route::post('/tasks', function (TaskRequest $request){
 
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfuly');
})->name('tasks.store');

// Route to update the edit 
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request){

    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfuly');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task){

    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task Deleted successfully!');

})->name('tasks.destroy');


Route::put('tasks/{task}/toggle-complete', function(Task $task){
    $task->toggleComplete();
    return redirect()->back()->with('success', 'Task updated successfully!');
})->name('tasks.toggle-complete');


//For not listed url, it will redirect to this route. 
Route::fallback(function () {
    return ' where are you going actually huh?, this page has been return by fallback route';
});



