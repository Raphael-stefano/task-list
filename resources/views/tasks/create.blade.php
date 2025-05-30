@extends('layout')

@section('title', "Create Task")

@section('content')
    
    <div class="d-flex align-items-center py-3">
        <a href="{{ route('tasks.index') }}" class="me-2"><i class="bi bi-arrow-left-circle text-light fs-4"></i></a>
        <h2 class="m-0">New Task</h2>
    </div>

    @include('components.form', [
        'action' => route("tasks.store"),
        'method' => 'post',
        'title_value' => old('title'),
        'description_value' => old('description'),
        'long_description_value' => old('long_description'),
        'button_text' => 'Create Task'
    ])

@endsection