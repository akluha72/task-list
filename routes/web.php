<?php

use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Task;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        // 'tasks' => App\Models\Task::all()
        // 'tasks' => App\Models\Task::latest()->get()
        'tasks' => App\Models\Task::latest()->where('completed', true)->get()

    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

// Route to display one single task
Route::get('/tasks/{id}', function ($id) {
    return view('show', [
        'task' => \App\Models\Task::findOrFail($id)
    ]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request){
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    //create new model object
    $task = new Task;
    //setting task property
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    //this create a new class model
    //call save method save(); to saved changes in database. 

    $task->save();
    return redirect()->route('tasks.show', ['id' => $task->id]);
})->name('tasks.store');

//For not listed url, it will redirect to this route. 
Route::fallback(function () {
    return ' where are you going actually huh?, this page has been return by fallback route';
});

