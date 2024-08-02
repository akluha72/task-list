@extends('layouts.app')

@section('title', 'Create New Task')

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}"> 
    @csrf
    {{ $errors }}
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title"/>
            <p>{{ $errors['title']}}</p>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5 "></textarea>
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" cols="30" rows="15 "></textarea>
        </div>
        <button type="submit">Add Task</button>
    </form>
@endsection