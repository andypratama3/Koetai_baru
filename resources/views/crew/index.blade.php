@extends('layouts.user')
@section('title','Semua Tim')
@section('content')
{{-- <div class="container-semtim">
    <div class="isi-semtim">
        <h1 class="judul-semtim">SEMUA TIM</h1>
        <div class="container-anggota">

            <section id="gallery" class="gallery">
                @foreach ($crews as $crew)
                <div class="container-fluid">

                <div class="row gy-4 justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-md-6">

                        <div class="gallery-item h-100">

                            <img src="{{ asset('storage/img/Anggota/'.$crew->foto) }}" class="img-fluid" alt="">
                            <div class="gallery-links d-flex align-items-center justify-content-center">
                            <a href="{{ asset('storage/img/Anggota/'.$crew->foto) }}" title="Gallery 1" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                            <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>

                            </div>

                        </div>

                    </div>
                </div>

                </div>
                @endforeach
            </section>

        </div>
    </div>
</div> --}}
<main>
<div class="container-semtim">
    <div class="isi-semtim">
        <h1 class="judul-semtim">SEMUA TIM</h1>
        <div class="container-anggota">
            <div class="anggota">
                 @foreach ($crews as $crew)
                    <img src="{{ asset('storage/img/Anggota/'.$crew->foto) }}" alt="" class="img-fluid"></a>
                    @endforeach
                </div>

              </div>

            </div>

        </div>
    </div>
</div>
</main>
@include('layouts.script')
@endsection
