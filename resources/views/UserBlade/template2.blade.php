<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dapur Kenyang</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/templatemo.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />

    <!-- Load fonts style after rendering the layout styles -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap"
    />
    <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
</head>

<body>
<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow fixed-top bg-white">
    <div class="container d-flex justify-content-between align-items-center">
        <a
            class="navbar-brand text-success1 logo h3 align-self-center"
            href="/"
        ><img
                src="assets/img/logo1.png"
                alt="dapurKenyang"
                class="me-2"
            />Dapur Kenyang.</a
        >

        <button
            class="navbar-toggler border-0"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#templatemo_main_nav"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div
            class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between"
            id="templatemo_main_nav"
        >
            <div class="flex-fill">
                <ul
                    class="nav navbar-nav d-flex justify-content-between mx-lg-auto"
                >
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/produk-dapurkenyang">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Kontak</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <a class="nav-icon position-relative text-decoration-none" href={{isset(session('login_user')['id_user']) ? "/order-dapurkenyang/" . session('login_user')['id_user'] : '/login-user'}}>
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span
                        class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"
                    ></span>
                </a>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                </a>
                <span>{{isset(session('login_user')['email']) ? session('login_user')['email'] : "Guest"}}</span>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if(!isset(session('login_user')['email']))
                        <li>
                            <a class="dropdown-item" href="/login-user">
                                <i class="fa fa-fw fas fa-sign-in-alt"></i> Login</a>
                        </li>
                    @else
                        <li>
                            <a class="dropdown-item" href="logout-user">
                                <i class="fa fa-fw fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Close Header -->

@yield('content')

<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pt-5 flex-fill">
                <h2 class="h2 text-light border-bottom pb-3 border-light">
                    Dapur Kenyang
                </h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a
                            class="text-decoration-none"
                            href="https://wa.me/{{$kontak[0]["nomor_telepon"]}}"
                        >{{$kontak[0]["nomor_telepon"]}}</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a
                            class="text-decoration-none"
                            href="mailto:{{$kontak[0]["email"]}}"
                        >{{$kontak[0]["email"]}}</a>
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        {{$kontak[0]["alamat_jalan"]}}
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">
                    Info Lebih Lanjut
                </h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="/">Beranda</a></li>
                    <li><a class="text-decoration-none" href="#tentang">Tentang Kami</a></li>
                    <li><a class="text-decoration-none" href="#kontak">Kontak</a></li>
                </ul>
            </div>
        </div>

        <div class="row text-light mb-4">
            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
            <div class="col-auto me-auto">
                <ul class="list-inline text-left footer-icons">
                    <li
                        class="list-inline-item border border-light rounded-circle text-center"
                    >
                        <a
                            class="text-light text-decoration-none"
                            target="_blank"
                            href={{$kontak[0]["facebook"]}}
                        ><i class="fab fa-facebook-f fa-lg fa-fw"></i
                            ></a>
                    </li>
                    <li
                        class="list-inline-item border border-light rounded-circle text-center"
                    >
                        <a
                            class="text-light text-decoration-none"
                            target="_blank"
                            href={{$kontak[0]["instagram"]}}
                        ><i class="fab fa-instagram fa-lg fa-fw"></i
                            ></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="w-100 bg-black py-3">
        <p class="text-center text-light">
            Copyright &copy; 2024 Company Official_DapurKenyang
        </p>
    </div>
</footer>
<!-- End Footer -->

@include('sweetalert::alert')

<!-- Start Script -->
<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/templatemo.js"></script>
<script src="assets/js/custom.js"></script>
<!-- End Script -->
</body>
</html>
