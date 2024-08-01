<header> Task list</header>

<div>
    {{-- @if (count($tasks))
        <h2>There are some task need to be done</h2>
        <div class="task-container">
            @foreach ($tasks as $task)
                <p>{{ $task->title }}</p>
            @endforeach
        </div>
    @else
        <h2>No Tasks yet</h2>
    @endif
     --}}
    {{-- Alternative to check if the variable is exist or not --}}
    @forelse ($tasks as $task)
        <p>{{ $task->title}}</p>
    @empty
        <p>no id here</p>
    @endforelse
</div>
