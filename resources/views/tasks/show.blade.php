@extends('layout')

@section('title', $task->title)

@section('content')

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Task</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete the task?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <div>
                <form method="post" action="{{ route('tasks.destroy', ['task' => $task->id]) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="w-100 d-flex flex-column align-items-center my-4">
    <div class="card w-50">
        <div class="card-header d-flex justify-content-between">
            <a href="{{ route('tasks.index') }}"><i class="bi bi-arrow-left-circle text-light fs-5"></i></a>
            <div class="d-flex flex-row align-items-center">
                <button type="button" class="btn p-0 me-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="bi bi-trash text-light fs-5 me-2"></i>
                </button>
                <a href="{{ route("tasks.edit", ['task' => $task->id]) }}"><i class="bi bi-pencil text-light fs-5"></i></a>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text">{{ $task->description }}</p>
            @if ($task->long_description )    
                <p class="card-text">{{ $task->long_description }}</p>
            @endif
            @if ($task->completed)
                <p class="text-success">Task Completed!</p>
            @else
                <p class="text-danger">Task not Completed</p>
            @endif
            <div class="mb-3">
                <form method="post" action="{{ route('tasks.toggle-complete', ['task' => $task->id]) }}">
                    @csrf
                    @method('put')
                    @if ($task->completed)
                        <button type="submit" class="btn btn-primary">Mark as Uncompleted</button>
                    @else
                        <button type="submit" class="btn btn-primary">Complete Task</button>
                    @endif
                </form>
            </div>
            <small>Created {{ $task->created_at->diffForHumans() }} / </small>
            <small>Updated {{ $task->updated_at->diffForHumans() }}</small>
        </div>
    </div>
</div>

@endsection

