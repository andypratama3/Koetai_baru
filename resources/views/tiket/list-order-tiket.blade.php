@extends('layouts.user')
@section('title', 'List Order Tiket')
@section('content')


<div class="container-pesanan-tiket pesantiket">
    <div class="main-pesanan-tiket">
        <div class="isi-pesanan-tiket">
            <div class="container-isi">
                <div class="isinya">
                    <h1>Pesanan Tiket</h1>
                    @if ($orders->count() > 0)
                    @foreach ($orders as $order)
                    @php $total = 0; @endphp
                    <div class="list-tiket pesan_tiket">
                        <div class="nama-content">
                            <p>{{ $order->nama }}</p>
                        </div>
                        <div class="jumlah">
                            <input class="no qty-input-tiket" type="text" name="quantity " value="{{ $order->jumlah }}"
                                readonly>
                        </div>
                        <h5 class="total-harga"><span>Total :</span> Rp. {{ $order->gross_amount }}</h5>
                         <h5 class="status">Status Pembayaran    : <span style="margin-left:10px;" class="badge {{ $order->status == 'pending' ? 'bg-warning' : 'bg-success' }} text-dark">{{ $order->status }}</span></h5>
                        <div class="container-btn btn-detail">
                        <div class="container-btn">
                            @if ($order->status == 'Berhasil')
                            <button type="button" class="bttn btn-kuning" data-bs-toggle="modal"
                                data-bs-target="#detail_tiket_lauch" id="detail_tiket" data-id="<?=$order->id?>"
                                data-nama="<?=$order->nama ?>" data-total="<?=$order->total ?>"
                                data-kategori="<?=$order->tikets ?>" data-status="<?=$order->status ?>"
                                data-foto="<?=$order->tiket->foto ?>">
                                Detail Tiket
                            </button>
                            @else  
                            {{-- <button class="bttn btn-kuning btn-bayar pay-button">Bayar</button> --}}
                            @endif
                        </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <div class="total d-flex justify-content-end">
                        <a href="{{ route('index') }}"><button class="bttn btn-kuning">Kembali</button></a>
                    </div>
                </div>
                @else
                <div class="card-body text-center">
                    <h2>Pesanan <i class="bi bi-cart"></i>Tiket Anda Kosong!</h2>
                    <br>
                    <a href="{{url('tiket')}}" class="btn btn-lg btn-keranjang align-center"
                        style="background-color: #FFB716;">Beli Tiket</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade detail" id="detail_tiket_lauch" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-konten">
            <div class="modal-body">
                <img src="" alt="" id="foto" style="width: 100%; height: 80px;">
                <p id="id" class="id-tiket"></p>
            </div>
        </div>
    </div>
</div>
</div>


@include('layouts.script')

<script>
//     $(document).on('click', '.pay-button', function (e) {
//         window.location.href = "/checkout-tiket";
// });
</script>
@endsection
