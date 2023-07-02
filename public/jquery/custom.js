$(document).ready(function () {
    loadcart();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        function loadcart()
        {
            $.ajax({
                method: "GET",
                url: "/cart-count",
                success: function (response){
                    $('.cart-count').html('');
                    $('.cart-count').html(response.count);

                }
            });
        }
    $(document).on('click', '#details', function () {
        var nama = $(this).data('nama');
        var harga = $(this).data('harga');
        var foto = $(this).data('foto');
        var stock = $(this).data('stock');
        var id = $(this).data('id');

        $('#id').attr('value', id);
        $('#nama').text(nama);
        $('#harga').text(harga);
        var imageUrl = '/storage/img/produk/'+ foto;
        $('#foto').attr('src',imageUrl);
        $('#stock').text(stock);

    });
    $(document).on('click','.btncart', function (e) {
        var produk_id = $(this).closest('.detail').find('.prod_id').val();
        var produk_qty = $(this).closest('.detail').find('.prod_qty').val();
        var produk_ukuran = $('input[name="prod_ukuran"]:checked').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'prod_id': produk_id,
                'prod_qty': produk_qty,
                'prod_ukuran': produk_ukuran
            },
            success: function (response) {
                loadcart();
                Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: response.status,
                });
            },
            error: function (error) {
                var formErr = error.responseJSON.errors;
                console.log(error);
                for (var err in formErr) {
                  $('.' + err).html(formErr[err][0]); // Use formErr[err] instead of formErr(err)
                }
              }
        });

    });
    $(document).on('click','.increment-btn', function (e) {
        e.preventDefault();

        var inc_value = $(this).closest('.produk_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10 ){
            value++;
            $(this).closest('.produk_data').find('.qty-input').val(value);
    }
    });
    $(document).on('click','.decrement-btn', function (e) {
    e.preventDefault();
    var dec_value = $(this).closest('.produk_data').find('.qty-input').val();
    var value = parseInt(dec_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value > 1 ){
        value--;
        $(this).closest('.produk_data').find('.qty-input').val(value);
    }
    });
    $(document).on('click','.delete-cart', function (e) {
        e.preventDefault();

        var produk_id = $(this).closest('.produk_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        $.ajax({
            method: "POST",
            url: "delete-cart",
            data: {
                'prod_id': produk_id,

            },
            success: function (response){
                // window.location.reload();
                loadcart();
                $('.cartitems').load(location.href + " .cartitems");
                Swal.fire(
                'Success',
                response.status,
                'success',
                )
                // loadcart();
            }
        });
    });
    $(document).on('click','.changeQuantity', function (e) {
        e.preventDefault();

        var produk_id = $(this).closest('.produk_data').find('.prod_id').val();
        var qty = $(this).closest('.produk_data').find('.qty-input').val();
        data = {
            'prod_id': produk_id,
            'prod_qty': qty,
        }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response){
                $('.cartitems').load(location.href + " .cartitems");
            },
      });
    });
    $(document).on('click','.pesan-tiket', function (e) {
        e.preventDefault();

        var nama = $(this).closest('.pesan_tiket').find('.nama').val();
        var kategori_tiket = $(this).closest('.pesan_tiket').find('.tiket_id').val();
        var jumlah = $(this).closest('.pesan_tiket').find('.qty').val();

        var harga = $('#harga_tiket').data('harga');
        var total = harga * jumlah;

        data = {
            'nama': nama,
            'tiket_id': kategori_tiket,
            'jumlah': jumlah,
            'total': total,
        }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method: "POST",
            url: "/tiket-order",
            data: data,
            success: function (response){
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.status,
                });
                window.location.href = "/checkout-tiket";
            },
      });
    });
    $(document).on('click','.change-qty-tiket', function (e) {
        e.preventDefault();

        var id = $(this).closest('.pesan_tiket').find('.order_id').val();
        var qty = $(this).closest('.pesan_tiket').find('.qty-input-tiket').val();
        data = {
            'id': id,
            'jumlah': qty,
        }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method: "POST",
            url: "update-tiket",
            data: data,
            success: function (response){

                $('.pesantiket').load(location.href + " .pesantiket");
            },
      });
    });
    $(document).on('click','.delete-tiket-order', function (e) {
        e.preventDefault();

        var order_id = $(this).closest('.pesan_tiket').find('.order_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        $.ajax({
            method: "POST",
            url: "delete-pesanan-tiket",
            data: {
                'id': order_id,

            },
            success: function (response){
                // window.location.reload();
                loadcart();
                $('.pesantiket').load(location.href + " .pesantiket");
                Swal.fire(
                'Success',
                response.status,
                'success',
                )
                // loadcart();
            }
        });
    });
    $(document).on('click','.increment-btn-tiket', function (e) {
        e.preventDefault();

        var inc_value = $(this).closest('.pesan_tiket').find('.qty-input-tiket').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10 ){
            value++;
            $(this).closest('.pesan_tiket').find('.qty-input-tiket').val(value);
    }
    });
    $(document).on('click','.decrement-btn-tiket', function (e) {
    e.preventDefault();
    var dec_value = $(this).closest('.pesan_tiket').find('.qty-input-tiket').val();
    var value = parseInt(dec_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value > 1 ){
        value--;
        $(this).closest('.pesan_tiket').find('.qty-input-tiket').val(value);
    }
    });
    $(document).on('click','.btn-checkout', function (e) {
        var produk_id = $(this).closest('.cartitems').find('.prod_id').val();
        var produk_ukuran = $('input[name="prod_ukuran"]:checked').val();
        var produk_ukuran = $(this).closest('.cartitems').find('.prod_ukuran').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/checkout",
            data: {
                'prod_id': produk_id,
                'prod_qty': produk_qty,
                'prod_ukuran': produk_ukuran
            },
            success: function (response) {
                loadcart();
                Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: response.status,
                });
            }
        });
    });
    $(document).on('click','.btn-checkout-form', function (e) {
        var produk_id = $(this).closest('.detail').find('.prod_id').val();
        var produk_ukuran = $('input[name="prod_ukuran"]:checked').val();
        var produk_qty = $(this).closest('.detail').find('.prod_qty').val();

        $.ajax({
            method: "POST",
            url: "/add-to-checkout",
            data: {
                'prod_id': produk_id,
                'prod_qty': produk_qty,
                'prod_ukuran': produk_ukuran
            },
            success: function (response) {
                loadcart();
                Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: response.status,
                });
                window.location.href = "/checkout";
            },
            error: function (error) {
                var formErr = error.responseJSON.errors;
                console.log(error);
                for (var err in formErr) {
                  $('.' + err).html(formErr[err][0]); // Use formErr[err] instead of formErr(err)
                }
              }
        });
    });
    $(document).on('click','.btn-proses-checkout', function (e) {
        var produk_id = $(this).closest('.detail').find('.prod_id').val();
        var produk_ukuran = $('input[name="prod_ukuran"]:checked').val();
        var produk_qty = $(this).closest('.detail').find('.prod_qty').val();

        $.ajax({
            method: "POST",
            url: "/proses-checkout",
            data: {
                'prod_id': produk_id,
                'prod_qty': produk_qty,
                'prod_ukuran': produk_ukuran
            },
            success: function (response) {
                loadcart();
                Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: response.status,
                });
                window.location.href = "/checkout";
            },
            error:function(error){
                var formErr = error.responseJSON.errors;
                console.log(error);
                for(var err in formErr){
                    $('.'+ err ).html(formErr(err)[0]);
                }
           }
        });
    });
    $(document).on('click', '#detail_tiket', function () {

        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var jumlah = $(this).data('jumlah');
        var foto = $(this).data('foto');

        // $('#id').attr('value', id);
        $('#id').text(id);

        $('#nama').text(nama);
        $('#jumlah').text(jumlah);
        var imageUrl = '/storage/img/tiket/'+ foto;
        $('#foto').attr('src',imageUrl);


    });
    $(document).on('click','.proses-checkout', function (e) {
        //detail user
       var paymentMethod = document.getElementById("payment_method").value;
       var nama = document.getElementById("nama").value;
       var no_telp = document.getElementById("nomor_telpon").value;
       var alamat = document.getElementById("alamat").value;
       var catatan = document.getElementById("catatan").value;
       //produk
       var produk_id = $(this).closest('.cartitems').find('.prod_id').val();
       var produk_qty = $(this).closest('.cartitems').find('.prod_qty').val();
       var produk_ukuran = $(this).closest('.cartitems').find('.prod_ukuran').val();
       var total = $(this).closest('.cartitems').find('.total_pesanan').val();
       if(paymentMethod === 'bayar_sekarang'){
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       $.ajax({
           method: "POST",
           url: "/proses-checkout",
           data: {
               'nama_penerima': nama,
               'nomor_telpon': no_telp,
               'alamat': alamat,
               'catatan': catatan,
               'prod_id': produk_id,
               'prod_qty': produk_qty,
               'prod_ukuran': produk_ukuran,
               'total': total,
               'payment_method': paymentMethod,
           },
           success: function (response) {
               Swal.fire({
               icon: 'success',
               title: 'Berhasil',
               text: response.status,
               });
               window.location.href = "/pembayaran";
           },
           error:function(error){
                var formErr = error.responseJSON.errors;
                console.log(error);
                for(var err in formErr){
                    $('.'+ err ).html(formErr(err)[0]);
                }
           }
       });
       }else{
           $.ajax({
           method: "POST",
           url: "/proses-checkout",
           data: {
               'nama_penerima': nama,
               'nomor_telpon': no_telp,
               'alamat': alamat,
               'catatan': catatan,
               'prod_id': produk_id,
               'prod_qty': produk_qty,
               'prod_ukuran': produk_ukuran,
               'total': total,
               'payment_method': paymentMethod,
           },
           success: function (response) {
               Swal.fire({
               icon: 'success',
               title: 'Berhasil',
               text: response.status,
               });
               window.location.href = "/order-shop";
           },
           error:function(error){
            var formErr = error.responseJSON.errors;
            console.log(error);
            for(var err in formErr){
                $('.'+ err).html(formErr[err][0]);
            }
       }

       });
       }
   });

});

