<!doctype html>
<html lang="en">
<head>
<title>Daftar Akun | Dapur Kenyang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.ico" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="loginuser/css/login.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Silahkan Buat Akun Kamu:)</h2>
                                <a href="/login-user" class="btn btn-white btn-outline-white">Login</a>
							</div>
			</div>
				<div class="login-wrap p-4 p-lg-5">
			<div class="d-flex">
			<div class="w-100">
			<h3 class="mb-4">Daftar Akun</h3>
			</div>
			</div>

			  @if($errors->any())
                @foreach($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                    @endif

			<!----form input registrasi akun start------>
			<form action="register-user-aksi" method="post" class="signin-form">
				@csrf
        <div class="form-group mb-3">
		<label class="label">Nama</label>
			<input type="text" name="nama" class="form-control" placeholder="Nama" required>
		</div>
		<div class="form-group mb-3">
		<label class="label">Email</label>
			<input type="email" name="email" class="form-control" placeholder="Email" required>
		</div>
		<div class="form-group mb-3">
		<label class="label">Password</label>
		    <input type="password" name="password" class="form-control" placeholder="Password" required>
		</div>
        <div class="form-group mb-3">
		<label class="label">Confir Password</label>
		    <input type="password" name="confir" class="form-control" placeholder="Confir Password" required>
		</div>
	<div class="form-group">
		<a href="#">
        <button type="submit" class="form-control btn btn-primary submit px-3">Daftar</button>
        </a>
		</div>
		<div class="form-group d-md-flex">
		</form>
	<!----form input registrasi akun end------>
		</div>
		</div>
				</div>
			</div>
		</div>
	</section>

	@include('sweetalert::alert')

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>

