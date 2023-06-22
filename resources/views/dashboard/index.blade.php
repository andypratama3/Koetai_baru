@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title">Kategori Tiket</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class=" ri-ticket-2-line"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{ $tikets }} <span class="text-success small pt-1 fw-bold">Tiket</span> </h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title">Orderan Tiket </h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class=" ri-ticket-2-line"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{ $ordersTiket }} <span class="text-success small pt-1 fw-bold">Orderan Tiket</span></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title">Total Event </h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class=" ri-calendar-event-line"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{ $Event }} <span class="text-success small pt-1 fw-bold">Event</span></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title">Total Event </h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="ri-user-2-fill"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{ $talent }} <span class="text-success small pt-1 fw-bold"> Talents</span></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>


        </div>
    </div>
</div>


@endsection
