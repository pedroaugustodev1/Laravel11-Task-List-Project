@extends('layouts.app')

@section('tittle', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf 
        @isset($task)
            @method('PUT')
        @endisset
        <div class="card mb-5">
            <div class="mb-4">
                <label for="title">
                    Title
                </label>
                <input type="text" name="title" id="title" @class(['border-red-500' => $errors->has('title')]) value="{{ $task->title ?? old('title') }}">
                @error('title')
                    <p class="error-message vermelho font-light font-style: italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="card mb-5">
            <div class="mb-4">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" @class(['border-red-500' => $errors->has('description')]) >{{ $task->description ?? old('description') }}</textarea>
                @error('description')
                    <p class="error-message vermelho font-light font-style: italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="card mb-6">
            <div class="mb-4">
                <label for="long_description">Long Description</label>
                <textarea name="long_description" id="long_description" cols="30" rows="10" @class(['border-red-500' => $errors->has('long_description')]) >{{ $task->long_description ?? old('long_description') }}</textarea>
                @error('long_description')
                    <p class="error-message vermelho font-light font-style: italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4 flex justify-center">
            <button type="submit" class="shadow btn flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg> 
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
            <a class="btn shadow flex items-center gap-1" href="{{route('tasks.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
                    
                Cancel</a>
        </div>
    </form>
@endsection