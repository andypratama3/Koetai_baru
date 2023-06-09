
@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show text-center float-end text-black" data-delay="20" style="height: 55px; top: 10px; right: 10px; font-weight:900;" role="alert">
    <p><i class="ri ri-ban"></i>Peringatan!</p>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(session()->get('success-insert'))
<div class="alert alert-success alert-dismissible fade show text-center float-end text-black" data-delay="20" style="height: 55px; top: 10px; right: 10px; font-weight:900;" role="alert">
    {{session()->get('success-insert')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
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

@if(session()->get('success'))
<div class="alert alert-primary alert-dismissible fade show text-center float-end text-black" data-delay="20" style="height: 55px; top: 10px; right: 10px; font-weight:900;" role="alert">
    <i class="bi bi-ban me-1"></i>
    {{session()->get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif





