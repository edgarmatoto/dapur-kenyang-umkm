@extends('UserBlade.template2')

@section('content')
    <!-- Start Content produk-->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item mt-6">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#"
                                >Semua Produk</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>

                <!--produk start-->
                <div class="row">
                    @foreach($produk as $p)
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img
                                        class="card-img rounded-0 img-fluid"
                                        src={{$p["gambar_produk"]}}
                                        alt={{$p["nama_produk"]}}
                                    />
                                    <div
                                        class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"
                                    >
                                        <ul class="list-unstyled">
                                            <li>
                                                <a
                                                    class="btn btn-success text-white mt-2"
                                                    href="/detail-dapurkenyang/{{$p["id_produk"]}}"
                                                ><i class="far fa-eye"></i
                                                    ></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="/detail-dapurkenyang/{{$p["id_produk"]}}" class="h3 text-decoration-none"
                                    >{{$p["nama_produk"]}}</a>
                                    <ul
                                        class="w-100 list-unstyled d-flex justify-content-between mb-0"
                                    >
                                        <li>Stok: {{$p["stok_produk"]}}</li>
                                        <li class="pt-2">
                      <span
                          class="product-color-dot color-dot-red float-left rounded-circle ml-1"
                      ></span>
                                            <span
                                                class="product-color-dot color-dot-blue float-left rounded-circle ml-1"
                                            ></span>
                                            <span
                                                class="product-color-dot color-dot-black float-left rounded-circle ml-1"
                                            ></span>
                                            <span
                                                class="product-color-dot color-dot-light float-left rounded-circle ml-1"
                                            ></span>
                                            <span
                                                class="product-color-dot color-dot-green float-left rounded-circle ml-1"
                                            ></span>
                                        </li>
                                    </ul>
                                    <p class="text-center mb-0">Rp{{$p["harga_produk"]}}/biji</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Content produk-->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Brand Kami</h1>
                    <p>
                        Sajian yang menggugah selera, bumbu yang mengundang kelezatan.
                        Temukan kenikmatan sejati dengan hidangan dari Dapur Kenyang "Your Life's Energy".
                    </p>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a
                                class="h1"
                                href="#multi-item-example"
                                role="button"
                                data-bs-slide="prev"
                            >
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div
                                class="carousel slide carousel-multi-item pt-2 pt-md-0"
                                id="multi-item-example"
                                data-bs-ride="carousel"
                            >
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">
                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="https://instagram.com/dapurkenyangg_sangatta?igshid=OGQ5ZDc2ODk2ZA=="
                                                ><img
                                                        class="img-fluid brand-img"
                                                        src="assets/img/brand1.png"
                                                        alt="Dapur Kenyang Sanggata"
                                                    /></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="https://instagram.com/taralashop88?igshid=OGQ5ZDc2ODk2ZA=="
                                                ><img
                                                        class="img-fluid brand-img"
                                                        src="assets/img/brand2.png"
                                                        alt="TaralaShop 88"
                                                    /></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="https://instagram.com/d.palekkotz?igshid=OGQ5ZDc2ODk2ZA=="
                                                ><img
                                                        class="img-fluid brand-img"
                                                        src="assets/img/brand3.png"
                                                        alt="Palekkotz"
                                                    /></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="https://instagram.com/dapur_kenyangg?igshid=OGQ5ZDc2ODk2ZA=="
                                                ><img
                                                        class="img-fluid brand-img"
                                                        src="assets/img/brand4.png"
                                                        alt="Dapur Kenyang Makassar"
                                                    /></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End First slide-->

                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="https://instagram.com/dapurkenyangg_pinrang?igshid=OGQ5ZDc2ODk2ZA=="
                                                ><img
                                                        class="img-fluid brand-img"
                                                        src="assets/img/brand5.png"
                                                        alt="Dapur Kenyang Pinrang"
                                                    /></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="https://instagram.com/taralashop88?igshid=OGQ5ZDc2ODk2ZA=="
                                                ><img
                                                        class="img-fluid brand-img"
                                                        src="assets/img/brand2.png"
                                                        alt="TaralaShop 88"
                                                    /></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="https://instagram.com/dapurkenyangg_sangatta?igshid=OGQ5ZDc2ODk2ZA=="
                                                ><img
                                                        class="img-fluid brand-img"
                                                        src="assets/img/brand1.png"
                                                        alt="Dapur Kenyang Sanggata"
                                                    /></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="https://instagram.com/d.palekkotz?igshid=OGQ5ZDc2ODk2ZA=="
                                                ><img
                                                        class="img-fluid brand-img"
                                                        src="assets/img/brand3.png"
                                                        alt="Palekkotz"
                                                    /></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Second slide-->

                                </div>
                                <!--End Slides-->
                            </div>
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a
                                class="h1"
                                href="#multi-item-example"
                                role="button"
                                data-bs-slide="next"
                            >
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->
@endsection
