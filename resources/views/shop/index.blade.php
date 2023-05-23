@extends('layouts.user')
@section('title', 'Shop')
@section('content')
 <div class="container-belanja produk_data">
        <nav class="nav-belanja">
            <ul>
                <li class="belanja-baju active" id="nav-baju">BAJU</li>
                <li class="belanja-mchan" id="nav-mchan">Tote Bag</li>
            </ul>
        </nav>
        <div class="isi-belanja" id="isi-belanja ">
            <!-- <div class="container-isi"> -->
            <div class="belanja-baju" id="belanja-baju">
                @foreach ($shops as $shop)
                <!-- BELANJA BAJU -->
                <div class="produk " data-bs-toggle="modal" data-bs-target="#modalss"
                id="details"
                data-id="<?=$shop->id ?>"
                data-nama="<?=$shop->nama ?>"
                data-harga="<?=$shop->harga ?>"
                data-foto="<?=$shop->foto ?>"
                data-stock="<?=$shop->stock ?>">
                    <img src="{{ asset('storage/img/produk/'.$shop->foto) }}" alt="Produk Baju 1" class="foto">
                    <div class="konten-bawah">
                        <div class="teks nama-produk">{{ $shop->nama }}</div>
                        <div class="teks harga">Rp. {{ $shop->harga }}</div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- BELANJA MERCHANDISE -->
            {{-- <div class="belanja-mchan" id="belanja-mchan">

                <div class="produk" data-bs-toggle="modal" data-bs-target="#mchanModal" onclick="tampilProduk()">
                    <img src="assets/img/produk-baju-1.png" alt="Produk Baju 1">
                    <div class="konten-bawah">
                        <div class="teks nama-produk">T-Shirt KMS</div>
                        <div class="teks harga">Rp. 99.000</div>
                    </div>
                </div>
                <div class="produk" data-bs-toggle="modal" data-bs-target="#mchanModal" onclick="tampilProduk()">
                    <img src="assets/img/produk-baju-1.png" alt="Produk Baju 1">
                    <div class="konten-bawah">
                        <div class="teks nama-produk">T-Shirt KMS</div>
                        <div class="teks harga">Rp. 99.000</div>
                    </div>
                </div>
                <div class="produk" data-bs-toggle="modal" data-bs-target="#mchanModal" onclick="tampilProduk()">
                    <img src="assets/img/produk-baju-1.png" alt="Produk Baju 1">
                    <div class="konten-bawah">
                        <div class="teks nama-produk">T-Shirt KMS</div>
                        <div class="teks harga">Rp. 99.000</div>
                    </div>
                </div>
                <div class="produk" data-bs-toggle="modal" data-bs-target="#mchanModal" onclick="tampilProduk()">
                    <img src="assets/img/produk-baju-1.png" alt="Produk Baju 1">
                    <div class="konten-bawah">
                        <div class="teks nama-produk">T-Shirt KMS</div>
                        <div class="teks harga">Rp. 99.000</div>
                    </div>
                </div>
                <div class="produk" data-bs-toggle="modal" data-bs-target="#mchanModal" onclick="tampilProduk()">
                    <img src="assets/img/produk-baju-1.png" alt="Produk Baju 1">
                    <div class="konten-bawah">
                        <div class="teks nama-produk">T-Shirt KMS</div>
                        <div class="teks harga">Rp. 99.000</div>
                    </div>
                </div>
                <div class="produk" data-bs-toggle="modal" data-bs-target="#mchanModal" onclick="tampilProduk()">
                    <img src="assets/img/produk-baju-1.png" alt="Produk Baju 1">
                    <div class="konten-bawah">
                        <div class="teks nama-produk">T-Shirt KMS</div>
                        <div class="teks harga">Rp. 99.000</div>
                    </div>
                </div>
                <div class="produk" data-bs-toggle="modal" data-bs-target="#mchanModal" onclick="tampilProduk()">
                    <img src="assets/img/produk-baju-1.png" alt="Produk Baju 1">
                    <div class="konten-bawah">
                        <div class="teks nama-produk">T-Shirt KMS</div>
                        <div class="teks harga">Rp. 99.000</div>
                    </div>
                </div>
            </div> --}}
            <!-- </div> -->
        </div>

        <!-- MODAL BAJU -->
        <div class="modal fade detail" id="modalss" tabindex="-1" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-konten">
                    <div class="modal-body">
                        <button type="button" class="tutup-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="produk-klik" id="produk-klik" >
                            <div class="konten-atas">
                                <img src="" id="foto" alt="Gambar Modal">
                                <div class="teks-gambar">
                                    <input type="hidden" id="id" class="prod_id">
                                <h2 id="nama"></h2>
                                  <td>Rp . <span id="harga"></span></td>
                                  <br>
                                   <td> Stok   : <span id="stock"></span></td>
                                </div>
                            </div>
                            <div class="konten-bawah">
                                <div class="ukuran">
                                    <p>Ukuran</p>
                                    <button id="l" style="margin-left: 0;">L</button>
                                    <button id="xl">XL</button>
                                    <button id="xxl">XXL</button>
                                </div>
                                <div class="jumlah">
                                    <h2>jumlah: </h2>
                                    <input type="number" min="1" max="100" value="1" class="prod_qty">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-bawah">
                        <div class="tombolnya">
                            <button value="atc" class="btn-atc btncart">
                                <i class='bx bx-cart-add bx-md ikon'></i>
                                <span class="teks-checkout">Tambahkan Ke Keranjang</span>
                            </button>
                            <button value="beli" class="btn-beli teks-checkout btn-beli">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- MODAL MERCHANDISE -->
        <div class="modal fade" id="mchanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-konten">
                    <div class="modal-body">
                        <button type="button" class="tutup-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="produk-klik" id="produk-klik">
                            <div class="konten-atas">
                                <img src="assets/img/produk-baju-1.png" alt="Produk Baju 1">
                                <div class="teks-gambar">
                                    <p>Rp.99.000 - Rp.119.000</p>
                                    <span>Stok: 100</span>
                                </div>
                            </div>
                            <div class="konten-bawah">
                                <div class="ukuran">
                                    <p>Ukuran</p>
                                    <button id="l" style="margin-left: 0;">L</button>
                                    <button id="xl">XL</button>
                                    <button id="xxl">XXL</button>
                                </div>
                                <div class="jumlah">
                                    <p>jumlah: </p>
                                    <input type="number" min="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-bawah">
                        <div class="tombolnya">
                            <button value="atc" class="btn-atc">
                                <i class='bx bx-cart-add bx-md ikon'></i>
                                <span class="teks-checkout">Tambahkan Ke Keranjang</span>
                            </button>
                            <button value="beli" class="btn-beli teks-checkout">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

@include('layouts.script')
    <script>
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

    $(document).ready(function () {
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

    });
    $('.btncart').click(function (e) {
        e.preventDefault();
        var produk_id = $(this).closest('.detail').find('.prod_id').val();
        var produk_qty = $(this).closest('.detail').find('.prod_qty').val();
        // var url = ({{ route('cart.store') }});
        // alert(prod_id)

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
    </script>
@endsection
