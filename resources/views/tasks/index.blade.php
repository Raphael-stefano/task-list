@extends('layout')

@section('title', "All tasks")

@section('content')
    
@if (count($tasks))
    <h2>Tasks</h2>
    <ul>
        @foreach ($tasks as $task)
            {{-- <div class="card w-50">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    <p class="card-text">{{ $task->long_description }}</p>
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
            </div> --}}
            <li>
                <a href="{{ route("tasks.show", [ 'task' => $task->id ]) }}" @class(['text-decoration-line-through' => $task->completed, 'fw-bold' => !$task->completed, "text-decoration-none" => !$task->completed, "text-light"])>{{ $task->title }}</a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('tasks.create') }}" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">New Task</a>

    @if ($tasks->count())
        <div class="mt-3">
            {{ $tasks->links() }}
        </div>
    @endif
@else
    <div>There's no tasks</div>
@endif

@endsection

