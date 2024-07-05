@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">        
        <a href="{{ route('tasks.index')}}" class="link flex gap-1"> 
            <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>  
            Go back to the task list 
        </a>
    </div>

    <div class="card">
        <p class="px-4 mb-4 font-medium text-slate-900">{{ $task->description}}</p>

        @if ($task->long_description)
            <p class="mb-2 text-slate-900 break-all">{{ $task->long_description }}</p>
        @endif
    </div>

    <div class="mt-4 mb-4">
        <p class="mt-4 mb-2 font-light font-style: italic text-slate-500">Created {{ $task->created_at->diffForHumans() }}! • Updated {{ $task->updated_at->diffForHumans() }}!</p>
        
        <p class="mb-4">
            @if ($task->completed)
                <div class="flex gap-2 items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 verde">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                    <span class="font-light font-style: italic text-green-500">Completed!</span>
                </div>
            @else
                <div class="flex gap-2 items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 vermelho">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                    <span class="font-light font-style: italic text-rose-600">Not Completed!</span>
                </div>
            @endif
        </p>
    </div>
    <div class="flex justify-center gap-2">
        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task])}}">
            @csrf
            @method('PUT')
            <button type="submit" class="shadow btn flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>                  
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>

        <a href="{{ route('tasks.edit', ['task' =>$task->id]) }}" class="shadow btn flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>              
            Edit</a>

        <form action="{{ route('task.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')           
                <button type="submit" class="shadow btn flex items-center gap-1" > <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg> Delete</button>
        </form>
    </div>
@endsection