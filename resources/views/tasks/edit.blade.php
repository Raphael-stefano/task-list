@extends('layout')

@section('title', "Edit Task")

@section('content')
    
    <div class="d-flex align-items-center py-3">
        <a href="{{ route('tasks.show', ['task' => $task]) }}" class="me-2"><i class="bi bi-arrow-left-circle text-light fs-4"></i></a>
        <h2 class="m-0">Update Task</h2>
    </div>

    @include('components.form', [
        'action' => route("tasks.update", ['task' => $task->id ]),
        'method' => 'put',
        'title_value' => $task->title,
        'description_value' => $task->description,
        'long_description_value' => $task->long_description,
        'button_text' => 'Update Task'
    ])

@endsection