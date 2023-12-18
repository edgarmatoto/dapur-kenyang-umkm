@extends('UserBlade.template3')

@section('content')
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5 mt-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img
                            class="card-img img-fluid"
                            src={{$produk[0]["gambar_produk"]}}
                            alt={{$produk[0]["nama_produk"]}}
                            id={{$produk[0]["nama_produk"]}}
                        />
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{$produk[0]["nama_produk"]}}</h1>
                            <p class="h3 py-2">Rp.{{$produk[0]["harga_produk"]}}</p>
                            <h6>Deskripsi:</h6>
                            <p>
                                {{$produk[0]["deskripsi_produk"]}}
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Stok :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{$produk[0]["stok_produk"]}}</strong></p>
                                </li>
                            </ul>

                            <input
                                type="hidden"
                                name="product-title"
                                value="Activewear"
                            />
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Jumlah
                                            <input
                                                type="hidden"
                                                name="product-quanity"
                                                id="product-quanity"
                                                value="1"
                                            />
                                        </li>
                                        <li class="list-inline-item">
                                            <span class="btn btn-success" id="btn-minus">-</span>
                                        </li>
                                        <li class="list-inline-item">
                          <span class="badge bg-secondary" id="var-value"
                          >1</span
                          >
                                        </li>
                                        <li class="list-inline-item">
                                            <span class="btn btn-success" id="btn-plus">+</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- jika tidak login -->
                            @if(!isset(session('login_user')['email']))
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <a
                                            class="btn btn-success text-white mt-2"
                                            href="/login-user"
                                        >Masukkan Keranjang<i class="fa fa-fw fa-cart-plus text-white mr-1"></i
                                            ></a>
                                    </div>
                                </div>
                                <!-- jika user sudah login -->
                            @else
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button
                                            class="btn btn-success text-white mt-2"
                                            onclick="tambahkeranjang()"
                                        >Masukkan Keranjang<i class="fa fa-fw fa-cart-plus text-white mr-1"></i
                                            ></button>
                                        <input id="idUser" type="hidden" value={{session('login_user')['id_user']}}>
                                        <input id="idProduk" type="hidden" value={{$produk[0]["id_produk"]}}>
                                        <script>
                                            function tambahkeranjang(){
                                                var jumlah = document.getElementById("product-quanity").value;
                                                // localStorage.setItem('jumlahorder', jumlah);
                                                var idUser = document.getElementById("idUser").value;
                                                var idProduk = document.getElementById("idProduk").value;

                                                addToCart(idUser, idProduk, jumlah)


                                            }

                                            function addToCart(idUser, idProduk, jumlah) {
                                                fetch(`/api/keranjang?id_user=${idUser}&id_produk=${idProduk}&jumlah=${jumlah}`, {
                                                    method: 'POST'
                                                })
                                                    .then(response => {
                                                        if (!response.ok) {
                                                            throw new Error('Gagal menambahkan produk ke keranjang');
                                                        }
                                                        console.log(response);
                                                    })
                                                    .then(data => {
                                                        // Lakukan sesuatu setelah produk berhasil ditambahkan
                                                        console.log('Produk berhasil ditambahkan ke keranjang:', data);
                                                        window.location.href = '/order-dapurkenyang' + '/' + idUser;
                                                    })
                                                    .catch(error => {
                                                        // Tangani kesalahan jika permintaan gagal
                                                        console.error('Error:', error);
                                                    });
                                            }
                                        </script>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
{{--    <section class="py-5">--}}
{{--        <div class="container">--}}
{{--            <div class="row text-left p-2 pb-3">--}}
{{--                <h4>Rekomendasi Produk</h4>--}}
{{--            </div>--}}

{{--            <!--Start Carousel Wrapper-->--}}
{{--            <!--slide 1 start-->--}}
{{--            <div id="carousel-related-product">--}}
{{--                <div class="p-2 pb-3">--}}
{{--                    <div class="product-wap card rounded-0">--}}
{{--                        <div class="card rounded-0">--}}
{{--                            <img--}}
{{--                                class="card-img rounded-0 img-fluid"--}}
{{--                                src="/assets/img/produk2.png"--}}
{{--                            />--}}
{{--                            <div--}}
{{--                                class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"--}}
{{--                            >--}}
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li>--}}
{{--                                        <a--}}
{{--                                            class="btn btn-success text-white mt-2"--}}
{{--                                            href="/detail-dapurkenyang"--}}
{{--                                        ><i class="far fa-eye"></i--}}
{{--                                            ></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="/detail-dapurkenyang" class="h3 text-decoration-none"--}}
{{--                            >Bakwan udang</a--}}
{{--                            >--}}
{{--                            <ul--}}
{{--                                class="w-100 list-unstyled d-flex justify-content-between mb-0"--}}
{{--                            >--}}
{{--                                <li>30 Terjual</li>--}}
{{--                                <li class="pt-2">--}}
{{--                    <span--}}
{{--                        class="product-color-dot color-dot-red float-left rounded-circle ml-1"--}}
{{--                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-blue float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-black float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-light float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-green float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <ul class="list-unstyled d-flex justify-content-center mb-1">--}}
{{--                                <li>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <p class="text-center mb-0">Rp2000/biji</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="p-2 pb-3">--}}
{{--                    <div class="product-wap card rounded-0">--}}
{{--                        <div class="card rounded-0">--}}
{{--                            <img--}}
{{--                                class="card-img rounded-0 img-fluid"--}}
{{--                                src="/assets/img/produk10.png"--}}
{{--                            />--}}
{{--                            <div--}}
{{--                                class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"--}}
{{--                            >--}}
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li>--}}
{{--                                        <a--}}
{{--                                            class="btn btn-success text-white mt-2"--}}
{{--                                            href="/detail-dapurkenyang"--}}
{{--                                        ><i class="far fa-eye"></i--}}
{{--                                            ></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="/detail-dapurkenyang" class="h3 text-decoration-none"--}}
{{--                            >Kue Kaktus</a--}}
{{--                            >--}}
{{--                            <ul--}}
{{--                                class="w-100 list-unstyled d-flex justify-content-between mb-0"--}}
{{--                            >--}}
{{--                                <li>30 Terjual</li>--}}
{{--                                <li class="pt-2">--}}
{{--                    <span--}}
{{--                        class="product-color-dot color-dot-red float-left rounded-circle ml-1"--}}
{{--                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-blue float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-black float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-light float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-green float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <ul class="list-unstyled d-flex justify-content-center mb-1">--}}
{{--                                <li>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <p class="text-center mb-0">Rp5000/bungkus</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="p-2 pb-3">--}}
{{--                    <div class="product-wap card rounded-0">--}}
{{--                        <div class="card rounded-0">--}}
{{--                            <img--}}
{{--                                class="card-img rounded-0 img-fluid"--}}
{{--                                src="/assets/img/produk11.png"--}}
{{--                            />--}}
{{--                            <div--}}
{{--                                class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"--}}
{{--                            >--}}
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li>--}}
{{--                                        <a--}}
{{--                                            class="btn btn-success text-white mt-2"--}}
{{--                                            href="/detail-dapurkenyang"--}}
{{--                                        ><i class="far fa-eye"></i--}}
{{--                                            ></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="/detail-dapurkenyang" class="h3 text-decoration-none"--}}
{{--                            >Terang Bulan Coklat</a--}}
{{--                            >--}}
{{--                            <ul--}}
{{--                                class="w-100 list-unstyled d-flex justify-content-between mb-0"--}}
{{--                            >--}}
{{--                                <li>20 Terjual</li>--}}
{{--                                <li class="pt-2">--}}
{{--                    <span--}}
{{--                        class="product-color-dot color-dot-red float-left rounded-circle ml-1"--}}
{{--                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-blue float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-black float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-light float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-green float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <ul class="list-unstyled d-flex justify-content-center mb-1">--}}
{{--                                <li>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <p class="text-center mb-0">Rp12000/bungkus</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="p-2 pb-3">--}}
{{--                    <div class="product-wap card rounded-0">--}}
{{--                        <div class="card rounded-0">--}}
{{--                            <img--}}
{{--                                class="card-img rounded-0 img-fluid"--}}
{{--                                src="/assets/img/produk12.png"--}}
{{--                            />--}}
{{--                            <div--}}
{{--                                class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"--}}
{{--                            >--}}
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li>--}}
{{--                                        <a--}}
{{--                                            class="btn btn-success text-white mt-2"--}}
{{--                                            href="/detail-dapurkenyang"--}}
{{--                                        ><i class="far fa-eye"></i--}}
{{--                                            ></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="/detail-dapurkenyang" class="h3 text-decoration-none"--}}
{{--                            >Panada</a--}}
{{--                            >--}}
{{--                            <ul--}}
{{--                                class="w-100 list-unstyled d-flex justify-content-between mb-0"--}}
{{--                            >--}}
{{--                                <li>35 Terjual</li>--}}
{{--                                <li class="pt-2">--}}
{{--                    <span--}}
{{--                        class="product-color-dot color-dot-red float-left rounded-circle ml-1"--}}
{{--                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-blue float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-black float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-light float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-green float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <ul class="list-unstyled d-flex justify-content-center mb-1">--}}
{{--                                <li>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <p class="text-center mb-0">Rp2000/biji</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--slide 1 end-->--}}

{{--                <!--slide 2 start-->--}}
{{--                <div class="p-2 pb-3">--}}
{{--                    <div class="product-wap card rounded-0">--}}
{{--                        <div class="card rounded-0">--}}
{{--                            <img--}}
{{--                                class="card-img rounded-0 img-fluid"--}}
{{--                                src="/assets/img/produk13.png"--}}
{{--                            />--}}
{{--                            <div--}}
{{--                                class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"--}}
{{--                            >--}}
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li>--}}
{{--                                        <a--}}
{{--                                            class="btn btn-success text-white mt-2"--}}
{{--                                            href="/detail-dapurkenyang"--}}
{{--                                        ><i class="far fa-eye"></i--}}
{{--                                            ></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="/detail-dapurkenyang" class="h3 text-decoration-none"--}}
{{--                            >Roti Goreng Isi Kacang</a--}}
{{--                            >--}}
{{--                            <ul--}}
{{--                                class="w-100 list-unstyled d-flex justify-content-between mb-0"--}}
{{--                            >--}}
{{--                                <li>34 Terjual</li>--}}
{{--                                <li class="pt-2">--}}
{{--                    <span--}}
{{--                        class="product-color-dot color-dot-red float-left rounded-circle ml-1"--}}
{{--                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-blue float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-black float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-light float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-green float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <ul class="list-unstyled d-flex justify-content-center mb-1">--}}
{{--                                <li>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <p class="text-center mb-0">Rp2000/biji</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="p-2 pb-3">--}}
{{--                    <div class="product-wap card rounded-0">--}}
{{--                        <div class="card rounded-0">--}}
{{--                            <img--}}
{{--                                class="card-img rounded-0 img-fluid"--}}
{{--                                src="/assets/img/produk14.png"--}}
{{--                            />--}}
{{--                            <div--}}
{{--                                class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"--}}
{{--                            >--}}
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li>--}}
{{--                                        <a--}}
{{--                                            class="btn btn-success text-white mt-2"--}}
{{--                                            href="/detail-dapurkenyang"--}}
{{--                                        ><i class="far fa-eye"></i--}}
{{--                                            ></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="/detail-dapurkenyang" class="h3 text-decoration-none"--}}
{{--                            >Bolu Sakura</a--}}
{{--                            >--}}
{{--                            <ul--}}
{{--                                class="w-100 list-unstyled d-flex justify-content-between mb-0"--}}
{{--                            >--}}
{{--                                <li>25 Terjual</li>--}}
{{--                                <li class="pt-2">--}}
{{--                    <span--}}
{{--                        class="product-color-dot color-dot-red float-left rounded-circle ml-1"--}}
{{--                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-blue float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-black float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-light float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-green float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <ul class="list-unstyled d-flex justify-content-center mb-1">--}}
{{--                                <li>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <p class="text-center mb-0">Rp2000/biji</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="p-2 pb-3">--}}
{{--                    <div class="product-wap card rounded-0">--}}
{{--                        <div class="card rounded-0">--}}
{{--                            <img--}}
{{--                                class="card-img rounded-0 img-fluid"--}}
{{--                                src="/assets/img/produk15.png"--}}
{{--                            />--}}
{{--                            <div--}}
{{--                                class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"--}}
{{--                            >--}}
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li>--}}
{{--                                        <a--}}
{{--                                            class="btn btn-success text-white mt-2"--}}
{{--                                            href="/detail-dapurkenyang"--}}
{{--                                        ><i class="far fa-eye"></i--}}
{{--                                            ></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="/detail-dapurkenyang" class="h3 text-decoration-none"--}}
{{--                            >Roti Pawa Isi Kacang</a--}}
{{--                            >--}}
{{--                            <ul--}}
{{--                                class="w-100 list-unstyled d-flex justify-content-between mb-0"--}}
{{--                            >--}}
{{--                                <li>30 Terjual</li>--}}
{{--                                <li class="pt-2">--}}
{{--                    <span--}}
{{--                        class="product-color-dot color-dot-red float-left rounded-circle ml-1"--}}
{{--                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-blue float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-black float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-light float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-green float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <ul class="list-unstyled d-flex justify-content-center mb-1">--}}
{{--                                <li>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <p class="text-center mb-0">Rp2000/biji</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="p-2 pb-3">--}}
{{--                    <div class="product-wap card rounded-0">--}}
{{--                        <div class="card rounded-0">--}}
{{--                            <img--}}
{{--                                class="card-img rounded-0 img-fluid"--}}
{{--                                src="/assets/img/produk16.png"--}}
{{--                            />--}}
{{--                            <div--}}
{{--                                class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"--}}
{{--                            >--}}
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li>--}}
{{--                                        <a--}}
{{--                                            class="btn btn-success text-white mt-2"--}}
{{--                                            href="/detail-dapurkenyang"--}}
{{--                                        ><i class="far fa-eye"></i--}}
{{--                                            ></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="/detail-dapurkenyang" class="h3 text-decoration-none"--}}
{{--                            >Roti goreng isi coklat</a--}}
{{--                            >--}}
{{--                            <ul--}}
{{--                                class="w-100 list-unstyled d-flex justify-content-between mb-0"--}}
{{--                            >--}}
{{--                                <li>30 Terjual</li>--}}
{{--                                <li class="pt-2">--}}
{{--                    <span--}}
{{--                        class="product-color-dot color-dot-red float-left rounded-circle ml-1"--}}
{{--                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-blue float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-black float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-light float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-green float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <ul class="list-unstyled d-flex justify-content-center mb-1">--}}
{{--                                <li>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <p class="text-center mb-0">Rp2000/biji</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--slide 2 end-->--}}

{{--                <!--slide 3 start-->--}}
{{--                <div class="p-2 pb-3">--}}
{{--                    <div class="product-wap card rounded-0">--}}
{{--                        <div class="card rounded-0">--}}
{{--                            <img--}}
{{--                                class="card-img rounded-0 img-fluid"--}}
{{--                                src="/assets/img/produk17.png"--}}
{{--                            />--}}
{{--                            <div--}}
{{--                                class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"--}}
{{--                            >--}}
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li>--}}
{{--                                        <a--}}
{{--                                            class="btn btn-success text-white mt-2"--}}
{{--                                            href="/detail-dapurkenyang"--}}
{{--                                        ><i class="far fa-eye"></i--}}
{{--                                            ></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="/detail-dapurkenyang" class="h3 text-decoration-none"--}}
{{--                            >Risoles Sayur</a--}}
{{--                            >--}}
{{--                            <ul--}}
{{--                                class="w-100 list-unstyled d-flex justify-content-between mb-0"--}}
{{--                            >--}}
{{--                                <li>32 Terjual</li>--}}
{{--                                <li class="pt-2">--}}
{{--                    <span--}}
{{--                        class="product-color-dot color-dot-red float-left rounded-circle ml-1"--}}
{{--                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-blue float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-black float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-light float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-green float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <ul class="list-unstyled d-flex justify-content-center mb-1">--}}
{{--                                <li>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <p class="text-center mb-0">Rp2000/biji</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="p-2 pb-3">--}}
{{--                    <div class="product-wap card rounded-0">--}}
{{--                        <div class="card rounded-0">--}}
{{--                            <img--}}
{{--                                class="card-img rounded-0 img-fluid"--}}
{{--                                src="/assets/img/produk18.png"--}}
{{--                            />--}}
{{--                            <div--}}
{{--                                class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"--}}
{{--                            >--}}
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li>--}}
{{--                                        <a--}}
{{--                                            class="btn btn-success text-white mt-2"--}}
{{--                                            href="/detail-dapurkenyang"--}}
{{--                                        ><i class="far fa-eye"></i--}}
{{--                                            ></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="/detail-dapurkenyang" class="h3 text-decoration-none"--}}
{{--                            >Takoyaki</a--}}
{{--                            >--}}
{{--                            <ul--}}
{{--                                class="w-100 list-unstyled d-flex justify-content-between mb-0"--}}
{{--                            >--}}
{{--                                <li>40 Terjual</li>--}}
{{--                                <li class="pt-2">--}}
{{--                    <span--}}
{{--                        class="product-color-dot color-dot-red float-left rounded-circle ml-1"--}}
{{--                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-blue float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-black float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-light float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-green float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <ul class="list-unstyled d-flex justify-content-center mb-1">--}}
{{--                                <li>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <p class="text-center mb-0">Rp2000/biji</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="p-2 pb-3">--}}
{{--                    <div class="product-wap card rounded-0">--}}
{{--                        <div class="card rounded-0">--}}
{{--                            <img--}}
{{--                                class="card-img rounded-0 img-fluid"--}}
{{--                                src="/assets/img/produk19.png"--}}
{{--                            />--}}
{{--                            <div--}}
{{--                                class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"--}}
{{--                            >--}}
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li>--}}
{{--                                        <a--}}
{{--                                            class="btn btn-success text-white mt-2"--}}
{{--                                            href="/detail-dapurkenyang"--}}
{{--                                        ><i class="far fa-eye"></i--}}
{{--                                            ></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="/detail-dapurkenyang" class="h3 text-decoration-none"--}}
{{--                            >Kroket</a--}}
{{--                            >--}}
{{--                            <ul--}}
{{--                                class="w-100 list-unstyled d-flex justify-content-between mb-0"--}}
{{--                            >--}}
{{--                                <li>34 Terjual</li>--}}
{{--                                <li class="pt-2">--}}
{{--                    <span--}}
{{--                        class="product-color-dot color-dot-red float-left rounded-circle ml-1"--}}
{{--                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-blue float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-black float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-light float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-green float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <ul class="list-unstyled d-flex justify-content-center mb-1">--}}
{{--                                <li>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <p class="text-center mb-0">Rp2000/biji</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="p-2 pb-3">--}}
{{--                    <div class="product-wap card rounded-0">--}}
{{--                        <div class="card rounded-0">--}}
{{--                            <img--}}
{{--                                class="card-img rounded-0 img-fluid"--}}
{{--                                src="/assets/img/produk20.png"--}}
{{--                            />--}}
{{--                            <div--}}
{{--                                class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"--}}
{{--                            >--}}
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li>--}}
{{--                                        <a--}}
{{--                                            class="btn btn-success text-white mt-2"--}}
{{--                                            href="/detail-dapurkenyang"--}}
{{--                                        ><i class="far fa-eye"></i--}}
{{--                                            ></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="/detail-dapurkenyang" class="h3 text-decoration-none"--}}
{{--                            >Putu Ayu</a--}}
{{--                            >--}}
{{--                            <ul--}}
{{--                                class="w-100 list-unstyled d-flex justify-content-between mb-0"--}}
{{--                            >--}}
{{--                                <li>41 Terjual</li>--}}
{{--                                <li class="pt-2">--}}
{{--                    <span--}}
{{--                        class="product-color-dot color-dot-red float-left rounded-circle ml-1"--}}
{{--                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-blue float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-black float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-light float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                    <span--}}
{{--                                        class="product-color-dot color-dot-green float-left rounded-circle ml-1"--}}
{{--                                    ></span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <ul class="list-unstyled d-flex justify-content-center mb-1">--}}
{{--                                <li>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-warning fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                    <i class="text-muted fa fa-star"></i>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <p class="text-center mb-0">Rp2000/biji</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--slide 3 end-->--}}
{{--    </section>--}}
    <!-- End Article -->
@endsection
