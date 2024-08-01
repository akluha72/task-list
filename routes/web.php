<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;



class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {
    }
}

$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        null,
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];


Route::get('/', function () {    
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () use ($tasks) {
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

// Route to display one single task
Route::get('/tasks/{id}', function ($id) use ($tasks) {
    //laravel collection
        //convert arrays to a laravel collection object
        //in php arrays are not object, it's primitve data type. you need to use function to do something in arrays
        // in java arrays are object. 
    $task = collect($tasks)->firstWhere('id', $id);

    //error handling using abort();
    if(!$task){
        abort(Response::HTTP_NOT_FOUND);
        //Response is a class and have a prefix class
    }
    return view('show', ['task' => $task]);
})->name('tasks.show');


//For not listed url, it will redirect to this route. 
Route::fallback(function () {
    return ' where are you going actually huh?, this page has been return by fallback route';
});

