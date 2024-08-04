@extends('layouts.app')

@section('title', 'Lists of tasks')

@section('content')
<nav class="mb-4">
    <a href=" {{ route('tasks.create') }}" class="link">&#128221; Create New Task</a>
</nav>
    <div>
        <ol>
            @forelse ($tasks as $task)
                <li>
                    {{-- <a href="/{{ $task->id }}">{{ $task->title }}</a> OLD METHODS --}}
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])> 
                        {{ $task->title }}</a>
                </li>
            @empty
                <p>No Task Yet</p>
            @endforelse
        </ol>
    </div>
    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
