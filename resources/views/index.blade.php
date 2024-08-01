<title>Task List</title>
<h1>Task List Application</h1>

<div>
    <h2>List of Task</h2>
    <ol>
        @forelse ($tasks as $task)
            <li>
                {{-- <a href="/{{ $task->id }}">{{ $task->title }}</a> OLD METHODS--}} 
                <a href="{{ route('task.show', ['id' => $task->id]) }}"> {{ $task->title}}</a>
            </li>
        @empty
            <p>No Task Yet</p>
        @endforelse
    </ol>

</div>
