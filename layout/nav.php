<body class="bg-gray-100">
	<nav class="navbar navbar-expand-lg navbar-light _bg-gradient-success fixed-top text-uppercase shadow">
		<div class="container">
			<!-- <a class="navbar-brand text-white" href="#"></a> -->

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto ">
					<li class="nav-item active">
						<a class="nav-link text-white" href="<?= base_url(''); ?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="<?= base_url('keranjang'); ?>">Keranjang</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="<?= base_url('checkout'); ?>">Checkout</a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<div class="input-group">
						<input type="text" class="form-control">
						<div class="input-group-append">
							<button class="btn btn-primary" id="basic-addon2">Cari</button>
						</div>
					</div>
				</form>
				<a href="<?= base_url('registrasi') ?>" class="ml-2 btn btn-success text-capitalize">Daftar</a>
				<a href="<?= base_url('login'); ?>" class="ml-2 btn btn-primary text-capitalize">Login</a>
			</div>
		</div>
	</nav>
	<div id="wrapper">
		<div class="container">