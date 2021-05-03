<?php 
$uri = uri_segment(1);
?>
<body class="bg-gray-100">
	<nav class="navbar navbar-expand-lg navbar-light _bg-gradient-success fixed-top text-uppercase shadow">
		<div class="container">
			<!-- <a class="navbar-brand text-white" href="#"></a> -->

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto ">
					<li class="nav-item <?= ($uri == '') ? 'active' : '' ?>">
						<a class="nav-link text-white" href="<?= './'; ?>">Home </a>
					</li>
					<li class="nav-item <?= ($uri == 'keranjang.php') ? 'active' : '' ?>">
						<a class="nav-link text-white" href="<?= 'keranjang.php'; ?>">Keranjang</a>
					</li>
					<li class="nav-item <?= ($uri == 'checkout.php') ? 'active' : '' ?>">
						<a class="nav-link text-white" href="<?= 'checkout.php'; ?>">Checkout</a>
					</li>
					<?php if (isset($_SESSION['user'])): ?>
						<li class="nav-item <?php ($uri == 'riwayat-belanja.php') ? 'active' : '' ?>">
							<a class="nav-link text-white" href="<?= '/riwayat-belanja.php'; ?>">Riwayat Belanja</a>
						</li>
					<?php endif ?>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<div class="input-group">
						<input type="text" class="form-control">
						<div class="input-group-append">
							<button class="btn btn-primary" id="basic-addon2">Cari</button>
						</div>
					</div>
				</form>
				<?php if (isset($_SESSION['user'])): ?>
					<a href="<?= 'logout.php'; ?>" class="btn btn-danger ml-2 text-capitalize">Logout</a>
					<a href="" class="btn btn-outline-light ml-2"><i class="fas fa-fw fa-user-edit"></i></a>
					<?php else: ?>
						<a href="<?= 'registrasi.php' ?>" class="ml-2 btn btn-success text-capitalize">Daftar</a>
						<a href="<?= 'login.php'; ?>" class="ml-2 btn btn-primary text-capitalize">Login</a>
					<?php endif ?>
				</div>
			</div>
		</nav>
		<div id="wrapper">
			<div class="container">