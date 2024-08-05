@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a href=" {{ route('tasks.index') }}" class="link">&#127969;
            Homepage </a>
    </div>

    <p class="mb-2 text-slate-700">Description : {{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-2"> Long Description: {{ $task->long_description }}</p>
    @endif
    <p class="mb-2">
        @if ($task->completed)
            <span class="font-medium text-green-500">
                Completed
            </span>
        @else
            <span class="font-medium text-red-500">
                Not Completed
            </span>
        @endif
    </p>

    <div class="mt-4">
        <p class="text-sm text-slate-500">Created: {{ $task->created_at->diffForHumans() }} | Updated
            {{ $task->updated_at->diffForHumans() }}</p>
    </div>

    <div class="flex gap-2">
        <form action=" {{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                Mark as {{ $task->completed ? 'not Completed' : 'Completed' }}
            </button>
        </form>

        <a href=" {{ route('tasks.edit', ['task' => $task]) }}" class="btn">Edit</a>

        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete Task</button>
        </form>
    </div>
@endsection
