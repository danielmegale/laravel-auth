@if (session('alert-message'))
    <div class="alert alert-{{ session('alert-type') ?? info }}">
        {{ session('alert-message') }}
    </div>
@endif
