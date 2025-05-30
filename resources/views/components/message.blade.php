<div class="alert alert-{{ $style }} {{ $dismissible ? 'alert-dismissible' : '' }} fade show" role="alert">
    {{ $message }}
    @if ($dismissible)   
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>