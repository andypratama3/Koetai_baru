@if (count($errors) > 0)
<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
    <h5><i class="bi bi-ban"></i>Peringatan!</h5>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
@endif
