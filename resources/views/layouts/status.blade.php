@if (session('status'))
    <div class="alert alert-secondary">
        {{ session('status') }}
    </div>
@endif