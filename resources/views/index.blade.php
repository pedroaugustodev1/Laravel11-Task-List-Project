@extends('layouts.app')

@section('title', 'List of tasks')

@section('content')

    <div>
        @forelse ($tasks as $task)
            <div class="flex justify-start font-style: italic py-2 hover:font-bold hover:py-4 hover:px-4">
                    <a href="{{route('tasks.show', ['task' => $task->id])}}" 
                        @class(['line-through' => $task->completed])>{{ $task->title }}</a>
            </div>
        @empty
            <div>There are no tasks</div>
        @endforelse
    
    <div class="flex mb-8 mt-4">
            <a href="{{ route('tasks.create')}}" class="flex items-center gap-1 btn2 shadow">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg> 
                Add Task
            </a>

    </div>
    
    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif

 @endsection