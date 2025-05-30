<form method="post" action="{{ $action }}">
    @csrf
    @if (in_array($method, ['put', 'patch', 'delete']))
        @method($method)
    @endif
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $title_value }}">
        @error('title')
            @include('components.message', [
                'style' => 'danger',
                'message' => $message,
                'dismissible' => true
            ])
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ $description_value }}</textarea>
        @error('description')
            @include('components.message', [
                'style' => 'danger',
                'message' => $message,
                'dismissible' => true
            ])
        @enderror
    </div>
    <div class="mb-3">
        <label for="long_description" class="form-label">Long Description</label>
        <textarea class="form-control" id="long_description" name="long_description" rows="5">{{ $long_description_value }}</textarea>
        @error('long_description')
            @include('components.message', [
                'style' => 'danger',
                'message' => $message,
                'dismissible' => true
            ])
        @enderror
    </div>
<button type="submit" class="btn btn-primary">{{ $button_text }}</button>