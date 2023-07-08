@extends('layouts.user')
@section('title', 'List Order Tiket')
@section('content')
<div class="container-pesanan-tiket pesantiket">
    <div class="main-pesanan-tiket">
        <div class="isi-pesanan-tiket">
            <div class="container-isi">
                <div class="isinya">
                    <h1>Pesanan Tiket</h1>
                    <div class="list-tiket pesan_tiket">
                        <div class="nama-content">
                            <p>{{ $nama }}</p>
                            <input type="hidden" name="nama" value="{{$nama}}">
                        </div>
                    <div class="jumlah">
                        <input class="no qty-input-tiket" type="text" name="jumlah" value="{{ $jumlah }}" readonly>
                    </div>
                    <h5 class="total-harga"><span>Total :</span> Rp. {{ $total }}</h5>
                    <div class="container-btn">
                    <button class="bttn btn-kuning btn-bayar pay-button">Bayar</button>
                    </div>
                </div>
                <hr>
            </div>
            </div>
        </div>
    </div>
</div>
    <form action="checkout-tiket-status" id="form-pesan-tiket" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="json" id="json_callback">
        <input type="hidden" name="nama" id="nama" value="{{ $nama }}">
        <input type="hidden" name="jumlah" id="jumlah" value="{{ $jumlah }}">
        <input type="hidden" name="tiket_id" id="tiket_id" value="{{ $tiket_id }}">
    </form>
    @include('layouts.script')
    <script>
    $(document).ready(function () {
        $(document).on('click', '.pay-button', function (e) {

            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{$snapToken}}', {
                onSuccess: function (result) {
                    Swal.fire(
                        'Success',
                        result.status,
                        'success',
                    )
                    console.log(result);
                    send_order_tiket(result);
                },
                onPending: function (result) {
                    alert("wating your payment!");
                    console.log(result);
                    send_order_tiket(result);
                },
                onError: function (result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                    send_order_tiket(result);
                },
                onClose: function () {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
            function send_order_tiket(result){
                document.getElementById('json_callback').value = JSON.stringify(result);
                nama = document.getElementById('nama').value;
                jumlah = document.getElementById('jumlah').value;
                tiket_id = document.getElementById('tiket_id').value;
                $("#form-pesan-tiket").submit();
            }
        });
    });
    </script>
@endsection
