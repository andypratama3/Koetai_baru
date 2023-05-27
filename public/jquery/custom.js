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

    $('.btncart').click(function (e) {
        var produk_id = $(this).closest('.detail').find('.prod_id').val();
        var produk_qty = $(this).closest('.detail').find('.prod_qty').val();
        var produk_ukuran = $(this).closest('.detail').find('.prod_ukuran').val();

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
                Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: response.status,
                });
            }
        });

    });
    $('.increment-btn').click(function (e){
        e.preventDefault();

        var inc_value = $(this).closest('.produk_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10 ){
            value++;
            $(this).closest('.produk_data').find('.qty-input').val(value);
    }

    });
    $('.decrement-btn').click(function (e){
    e.preventDefault();
    var dec_value = $(this).closest('.produk_data').find('.qty-input').val();
    var value = parseInt(dec_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value > 1 ){
        value--;
        $(this).closest('.produk_data').find('.qty-input').val(value);
    }
    });

    $('.delete-cart').click(function (e){
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
                window.location.reload();
                Swal.fire(
                'Success',
                response.status,
                'success',
                )
                // loadcart();
            }
        });
    });
    $('.changeQuantity').click(function (e){
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
                window.location.reload();
            },
      });
});
});
