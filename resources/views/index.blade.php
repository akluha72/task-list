@extends('layouts.app')

@section('title', 'Lists of tasks')

@section('content')
    <div>
        <ol>
            @forelse ($tasks as $task)
                <li>
                    {{-- <a href="/{{ $task->id }}">{{ $task->title }}</a> OLD METHODS --}}
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}"> {{ $task->title }}</a>
                </li>
            @empty
                <p>No Task Yet</p>
            @endforelse
        </ol>
    </div>
@endsection
