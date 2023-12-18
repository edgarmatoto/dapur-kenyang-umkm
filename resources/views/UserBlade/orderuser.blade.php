<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dapur Kenyang | Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico"/>
    <link rel="stylesheet" href="/assets/css/order.css">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/css/templatemo.css"/>

    <link rel="stylesheet" href="/assets/css/fontawesome.min.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css"
          integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous"
    />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            display: none;
        }
    </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow fixed-top bg-white">
    <div class="container d-flex justify-content-between align-items-center">
        <a
            class="navbar-brand text-success1 logo h3 align-self-center"
            href="/"
        ><img
                src="/assets/img/logo1.png"
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
                <a class="nav-icon position-relative text-decoration-none" href="#">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span
                        class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"
                    ></span>
                </a>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false"
                >
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

<!-- order start -->
<div class="container mt-6">
    <div class="row">
        <div class="col-xl-8">
            <!-- order satu start -->
            @foreach($keranjang as $index => $k)
                <div class="card border shadow-none">
                    <div class="card-body">
                        <div class="d-flex align-items-start border-bottom pb-3">
                            <div class="me-4">
                                <img src={{$k["gambar_produk"]}} alt={{$k["nama_produk"]}} class="avatar-lg rounded">
                            </div>
                            <div class="flex-grow-1 align-self-center overflow-hidden">
                                <div>
                                    <h5 class="text-truncate font-size-18"><a href="#" class="text-dark"
                                        >{{$k["nama_produk"]}}</a></h5>
                                </div>
                            </div>
                            <div class="flex-shrink-0 ms-2">
                                <ul class="list-inline mb-0 font-size-16">
                                    <li class="list-inline-item">
                                        <a
                                            class="text-danger px-1"
                                            onclick="hapusKeranjang({{ $k["id_user"] }}, {{ $k["id_produk"] }})"
                                        >
                                            <i class="mdi mdi-trash-can-outline"></i>
                                        </a>
                                        <script>
                                            function hapusKeranjang(idUser, idProduk) {
                                                deleteCart(idUser, idProduk)

                                                window.location.reload()
                                            }

                                            function deleteCart(idUser, idProduk) {
                                                fetch(`/api/keranjang?id_user=${idUser}&id_produk=${idProduk}`, {
                                                    method: 'DELETE',
                                                })
                                                    .then(response => {
                                                        if (!response.ok) {
                                                            throw new Error('Gagal menghapus produk dari keranjang')
                                                        }
                                                        console.log(response)
                                                    })
                                                    .then(data => {
                                                        console.log('Produk berhasil dihapus dari keranjang:', data)
                                                    })
                                                    .catch(error => {
                                                        console.error('Error:', error)
                                                    })
                                            }
                                        </script>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Harga</p>
                                        <h5 class="mb-0 mt-2"><span class="text-muted me-2"
                                            ></span>Rp.{{$k["harga_produk"]}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Jumlah</p>
                                        <div class="d-inline-flex">
                                            <ul class="list-inline pb-3">
                                                <li class="list-inline-item">
                                                    <span class="btn btn-success" onclick="update({{ $k["id"] }}, -1)"
                                                    >-</span>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span class="badge bg-secondary" id="var-value">{{$k["jumlah"]}}</span>
{{--                                                    <input--}}
{{--                                                        id="var-value"--}}
{{--                                                        onblur="updateValueOnBlur({{ $k["id"] }}, {{$k["jumlah"]}})"--}}
{{--                                                        style="width: 50px;"--}}
{{--                                                        type="number"--}}
{{--                                                        value={{$k["jumlah"]}}--}}
{{--                                                    >--}}

{{--                                                    <script>--}}
{{--                                                        function updateValueOnBlur(idKeranjang, oldValue) {--}}
{{--                                                            const newValue = document.getElementById("var-value").value;--}}

{{--                                                            if (oldValue !== newValue) {--}}
{{--                                                                fetch(`/api/keranjang/${idKeranjang}?nilaimanual=${newValue}`, {--}}
{{--                                                                    method: 'PUT',--}}
{{--                                                                })--}}
{{--                                                                    .then(response => {--}}
{{--                                                                        if (!response.ok) {--}}
{{--                                                                            throw new Error('Gagal update produk di keranjang')--}}
{{--                                                                        }--}}
{{--                                                                        console.log(response)--}}
{{--                                                                    })--}}
{{--                                                                    .then(data => {--}}
{{--                                                                        console.log('Produk berhasil update di keranjang:', data)--}}
{{--                                                                        window.location.reload()--}}
{{--                                                                    })--}}
{{--                                                                    .catch(error => {--}}
{{--                                                                        console.error('Error:', error)--}}
{{--                                                                    })--}}
{{--                                                            }--}}
{{--                                                        }--}}
{{--                                                    </script>--}}

                                                </li>
                                                <li class="list-inline-item">
                                                    <span class="btn btn-success" onclick="update({{ $k["id"] }}, 1)"
                                                    >+</span>
                                                </li>
                                            </ul>

                                            <script>
                                                function update(idKeranjang, nilai) {
                                                    fetch(`/api/keranjang/${idKeranjang}?nilai=${nilai}`, {
                                                        method: 'PUT',
                                                    })
                                                        .then(response => {
                                                            if (!response.ok) {
                                                                throw new Error('Gagal update produk di keranjang')
                                                            }
                                                            console.log(response)
                                                        })
                                                        .then(data => {
                                                            console.log('Produk berhasil update di keranjang:', data)
                                                            window.location.reload()
                                                        })
                                                        .catch(error => {
                                                            console.error('Error:', error)
                                                        })
                                                }
                                            </script>

                                            {{--                                            <p>{{$k["jumlah"]}}</p>--}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Total</p>
                                        <h5>Rp.<span id="{{$index}}">{{$k["harga_produk"] * $k["jumlah"]}}</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="row my-4">
                <div class="col-sm-6">
                    <a href="/produk-dapurkenyang" class="btn btn-link text-muted">
                        <i class="mdi mdi-arrow-left me-1"></i> Kembali Belanja </a>
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end mt-2 mt-sm-0">
                        <a class="btn btn-success" href="{{route("checkout", [
                            "id_user" => session('login_user')['id_user']
                        ])}}"
                        >
                            <i class="mdi mdi-cart-outline me-1"></i> Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="mt-5 mt-lg-0">
                <div class="card border shadow-none">
                    <div class="card-header bg-transparent border-bottom py-3 px-4">
                        <h5 class="font-size-16 mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body p-4 pt-2">
                        <div class="table-responsive">
                            <input
                                id="jumlahKeranjang"
                                type="hidden"
                                value={{count($keranjang)}}
                            >
                            <table class="table mb-0">
                                <tbody>
                                <tr>
                                    <td>Sub Total :</td>
                                    <td class="text-end">Rp.<span id="subTotal"></span></td>
                                    <script>
                                        var jumlahKeranjang = parseInt(document.getElementById('jumlahKeranjang').value)
                                        var subTotal = 0

                                        for (let i = 0; i < jumlahKeranjang; i++) {
                                            var harga = parseInt(document.getElementById((i.toString())).innerText)
                                            subTotal += harga
                                        }

                                        document.getElementById('subTotal').innerText = subTotal
                                    </script>
                                </tr>
                                <tr class="bg-light">
                                    <th>Total :</th>
                                    <td class="text-end">
<span class="fw-bold">
Rp.<span id="totalSemua"></span>
</span>
                                    </td>
                                    <script>
                                        var jumlahKeranjang = parseInt(document.getElementById('jumlahKeranjang').value)
                                        var totalSemua = 0

                                        for (let i = 0; i < jumlahKeranjang; i++) {
                                            var harga = parseInt(document.getElementById((i.toString())).innerText)
                                            totalSemua += harga
                                        }

                                        document.getElementById('totalSemua').innerText = totalSemua
                                    </script>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

</script>
</body>
</html>
