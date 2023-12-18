@extends('UserBlade.template')

@section('content')
    <!-- Start Banner Hero -->
    <div
        id="template-mo-zay-hero-carousel"
        class="carousel slide"
        data-bs-ride="carousel"
    >
        <ol class="carousel-indicators">
            @foreach($headerWebsite as $index => $h)
                <li
                    data-bs-target="#template-mo-zay-hero-carousel"
                    data-bs-slide-to="0"
                    class={{$index === 0 ? "active" : ""}}
                ></li>
            @endforeach
        </ol>
        <div class="carousel-inner bg-light1">
            @foreach($headerWebsite as $index => $h)
                <div class="carousel-item {{$index === 0 ? "active" : ""}}">
                    <div class="container mt-5">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <img class="img-fluid rounded-circle shadow" style="opacity: 0.92;" src={{$h["gambar_produk"]}} alt="{{$h['nama_produk']}}"/>
                            </div>
                            <div class="col-lg-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left align-self-center">
                                    <h1 class="h1 text-success1">
                                        <b>{{$index === 0 ? "Dapur Kenyang" : $h["nama_produk"]}}</b>
                                    </h1>
                                    <h3 class="h2">
                                        {{$h["slogan"]}}
                                    </h3>
                                    <p>
                                        {{$h["deskripsi"]}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <a
            class="carousel-control-prev text-decoration-none w-auto ps-3"
            href="#template-mo-zay-hero-carousel"
            role="button"
            data-bs-slide="prev"
        >
            <i class="fas fa-chevron-left"></i>
        </a>
        <a
            class="carousel-control-next text-decoration-none w-auto pe-3"
            href="#template-mo-zay-hero-carousel"
            role="button"
            data-bs-slide="next"
        >
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->

    <!--Tentang dapur kenyang start-->
    <section class="py-3 py-md-5 py-xl-8 bg-light" id="tentang">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-8">
                    <h3 class="fs-5 mb-2 my-4 text-secondary h1 text-success1 mt-5">
                        Tentang Kami
                    </h3>
                    <h2 class="display-5 mb-4 h3">
                        Dapur Kenyang adalah sebuah tempat di mana kami menyediakan kue
                        tradisional atau modern, berbagai macam makanan serta minuman
                        tersedia ditoko kami.
                    </h2>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row gy-3 gy-md-4 gy-lg-0">
                @foreach($tentangKami as $t)
                    <div class="col-12 col-lg-6">
                        <div class="card p-3 m-0 bg-white shadow">
                            <div class="row gy-3 gy-md-0 align-items-md-center">
                                <div class="col-md-5">
                                    <img
                                        src={{$t["foto"]}}
                                        class="img-fluid rounded-start"
                                    alt={{$t["judul"]}}
                                    />
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body p-0">
                                        <h2 class="card-title h4 mb-3">{{$t["judul"]}}</h2>
                                        <p class="card-text lead">
                                            {{$t["deskripsi"]}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--Tentang dapur kenyang end-->

    <!-- Start testimonial -->
    <section class="bg-white py-5 py-xl-8" id="testimoni">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="h1 text-success1 text-center">Testimoni</h2>
                    <p class="display-5 mb-4 mb-md-5 text-center">
                        Testimoni costumer Dapur Kenyang. Apa kata mereka?
                    </p>
                </div>
            </div>
        </div>

        <div class="container overflow-hidden">
            <div class="row gy-4 gy-md-0 gx-xxl-5">
                @foreach($testimoni as $t)
                    <div class="col-12 col-md-4">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body p-4 p-xxl-5 bg-light shadow">
                                <figure>
                                    <img
                                        class="img-fluid rounded-circle mb-4 border border-5"
                                        src={{$t["foto"]}}
                                        alt={{$t["nama"]}}
                                    />
                                    <form action="#">
                                        <ul class="list-unstyled d-flex justify-content-center mb-1">
                                            <li>
                                                <i class="{{ $t["skor_bintang"] > 0 ? "text-warning" : "text-muted" }} fa fa-star"></i>
                                                <i class="{{ $t["skor_bintang"] > 1 ? "text-warning" : "text-muted" }} fa fa-star"></i>
                                                <i class="{{ $t["skor_bintang"] > 2 ? "text-warning" : "text-muted" }} fa fa-star"></i>
                                                <i class="{{ $t["skor_bintang"] > 3 ? "text-warning" : "text-muted" }} fa fa-star"></i>
                                                <i class="{{ $t["skor_bintang"] > 4 ? "text-warning" : "text-muted" }} fa fa-star"></i>
                                            </li>
                                        </ul>
                                    </form>
                                    <figcaption>
                                        <div
                                            class="bsb-ratings text-warning mb-3"
                                            data-bsb-star="5"
                                            data-bsb-star-off="0"
                                        ></div>
                                        <blockquote class="bsb-blockquote-icon mb-4">
                                            {{$t["deskripsi"]}}
                                        </blockquote>
                                        <h4 class="mb-2">{{$t["nama"]}}</h4>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End testimonial -->

    <!-- Start aneka kue -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1 text-success1">Aneka Kue</h1>
                    <p>Ragam kue lezat yang menggoda, siap menyempurnakan hari Anda.</p>
                </div>
            </div>
            <div class="row">
                @foreach($produk as $p)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="/detail-dapurkenyang/{{$p["id_produk"]}}">
                                <img
                                    class="card-img-top"
                                    src={{$p["gambar_produk"]}}
                                    alt="..."
                                />
                            </a>
                            <div class="card-body">
                                <a
                                    href="/detail-dapurkenyang/{{$p["id_produk"]}}"
                                    class="h2 text-decoration-none text-dark"
                                >{{$p["nama_produk"]}}</a>
                                <h3 class="mt-3">Rp{{$p["harga_produk"]}}</h3>
                                <p class="card-text">
                                    {{$p["deskripsi_produk"]}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End aneka kue -->


    <!-- Start Content Page -->
    <div class="container-fluid bg-light1 py-5" id="kontak">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1 mt-6 text-success1">Kontak Kami</h1>
            <p>
                Jangan ragu untuk menghubungi kami! Layanan kami siap membantu Anda dalam
                setiap langkah. Kami siap menjawab pertanyaan dan memberikan solusi terbaik.
            </p>
        </div>
    </div>

    <!-- Start Map -->
    <div id="mapid" style="width: 100%; height: 350px">
        <iframe
            src={{$kontak[0]["alamat"]}}
            width="100%"
            height="400"
            style="border: 1"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
    </div>
    <!-- End Map -->

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Nama</label>
                        <input
                            type="text"
                            class="form-control mt-1"
                            id="name"
                            name="nama"
                            placeholder="Nama"
                        />
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Email</label>
                        <input
                            type="email"
                            class="form-control mt-1"
                            id="email"
                            name="email"
                            placeholder="Email"
                        />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputsubject">Subject</label>
                    <input
                        type="text"
                        class="form-control mt-1"
                        id="subject"
                        name="subject"
                        placeholder="Subject"
                    />
                </div>
                <div class="mb-3">
                    <label for="inputmessage">Pesan</label>
                    <textarea
                        class="form-control mt-1"
                        id="message"
                        name="pesan"
                        placeholder="Pesan"
                        rows="8"
                    ></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">
                            Kirim Pesan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact -->

@endsection
