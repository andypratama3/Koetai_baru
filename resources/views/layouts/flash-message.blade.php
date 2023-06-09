@if (count($errors) > 0)
<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
    <h5><i class="bi bi-ban"></i>Peringatan!</h5>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@if(session()->get('success-insert'))
<div class="alert alert-success alert-dismissible fade show text-center float-end text-black" data-delay="20" style="height: 55px; top: 10px; right: 10px; font-weight:900;" role="alert">
    {{session()->get('success-insert')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@endif
@if(session()->get('success-update'))
<div class="alert alert-primary alert-dismissible fade show text-center float-end text-black" data-delay="20" style="height: 55px; top: 10px; right: 10px; font-weight:900;" role="alert">
    <i class="bi bi-ban me-1"></i>
    {{session()->get('success-update')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->get('success-delete'))
<div class="alert alert-danger alert-dismissible fade show text-center float-end text-black" data-delay="20" style="height: 55px; top: 10px; right: 10px; font-weight:900;" role="alert">
    {{session()->get('success-delete')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif





