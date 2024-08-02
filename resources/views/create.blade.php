@extends('layouts.app')

@section('title', 'Create New Task')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.6rem;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"/>
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5 ">{{ old('description') }}</textarea>
            @error('description')
                <p class="error-message"> {{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" cols="30" rows="15 ">{{ old('long_description') }}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">Add Task</button>
    </form>
@endsection
