@extends('layouts.user')
@section('title', 'List Order Tiket')
@section('content')

<div class="container-pesanan-tiket pesantiket">
    <div class="main-pesanan-tiket">
        <div class="isi-pesanan-tiket">
            <div class="container-isi">
                <div class="isinya">
                    <h1>Pesanan Tiket</h1>
                    @if ($order->count() > 0)
                    @php $totals = 0; @endphp
                    {{-- @foreach ($orders as $order) --}}
                    @php $total = 0; @endphp
                    <div class="list-produk pesan_tiket">
                        <div class="produk-ukuran">
                            <div class="produk">
                                <p>{{ $order->nama }}</p>
                            </div>

                        </div>
                        @if($order->tiket->stok > $order->jumlah)
                        <input type="hidden" value="{{ $order->id }}" class="order_id">
                        <div class="jumlah">
                            <div class="">
                                <button class="minus change-qty-tiket decrement-btn-tiket">-</button>
                                <input class="no qty-input-tiket" type="text" name="quantity "
                                    value="{{ $order->jumlah }}">
                                <button class="plus change-qty-tiket increment-btn-tiket">+</button>
                            </div>
                        </div>
                        @php $total += $order->tiket->harga * $order->jumlah; @endphp
                        @else
                        <h6>Out Of Stock</h6>
                        @endif
                        <h5>Total : Rp. {{ $total }}</h5>
                        <h5>{{ $order->status }}</h5>
                        <div class="tombol-hapus-bayar">
                            <button class="btn btn-danger delete-tiket-order">Delete</button>
                            <button class="btn btn-warning btn-keranjang pay-button">Bayar</button>
                        </div>
                        <input type="hidden" value="{{ $order->tiket->harga }}" class="harga">
                        <input type="hidden" class="prod_id" value="{{ $order->prod_id }}">
                    </div>
                    <hr>
                    @php $totals += $order->tiket->harga * $order->jumlah; @endphp

                    {{-- @endforeach --}}

                    <div class="total">
                        <h5>Total Semua : Rp. {{ $totals }}</h5>
                        <button class="btn btn-warning btn-keranjang pay-button">Bayar</button>
                    </div>
                </div>
                @else
                <div class="card-body text-center">
                    <h2>Pesanan <i class="bi bi-cart"></i>Tiket Anda Kosong!</h2>
                    <br>
                    <a href="{{url('tiket')}}" class="btn btn-keranjang align-center"
                        style="background-color: #FFB716;">Beli Tiket</a>
                </div>
                @endif

            </div>
        </div>
    </div>
    @include('layouts.script')
    <script>
        $(document).ready(function () {
            $(".delete").click(function (e) {
                slug = e.target.dataset.id;
                swal({
                        title: 'Anda yakin?',
                        text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $(`#delete-${slug}`).submit();
                        } else {
                            // Do Nothing
                        }
                    });
            });
            $(document).on('click', '.pay-button', function (e) {
                // var order_id = $(this).closest('.pesan_tiket').find('.order_id').val();
                //   payButton.addEventListener('click', function () {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay('{{$snapToken}}', {
                    onSuccess: function (result) {
                        Swal.fire(
                            'Success',
                            result.status,
                            'success',
                        )
                        window.location.href = "/orderan-tiket";
                    },
                    onPending: function (result) {
                        /* You may add your own implementation here */
                        alert("wating your payment!");
                        console.log(result);
                    },
                    onError: function (result) {
                        /* You may add your own implementation here */
                        alert("payment failed!");
                        console.log(result);
                    },
                    onClose: function () {
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                })
            });
        });
    </script>


    {{-- <script type="text/javascript">
    //   var payButton = document.getElementById('pay-button');
    $(document).on('click','.pay-button', function (e) {
        //payButton.addEventListener('click', function () {
        //Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        var harga = $(this).closest('.pesan_tiket').find('.harga').val();
        var id = $(this).closest('.pesan_tiket').find('.order_id').val();
        var jumlah = $(this).closest('.pesan_tiket').find('.no').val();
        var total = harga * jumlah;
        // console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "bayar-tiket",
            data: {
                'id': id,
                'total': total,
            },
            window.snap.pay('', {
            onSuccess: function(result){
            alert("payment success!"); console.log(result);
          },
             onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
            onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          },
        });
    });
});
</script> --}}
    @endsection