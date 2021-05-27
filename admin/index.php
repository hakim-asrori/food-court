<?php
include "../function/bootstrap.php";
include "security.php";
include "layout/head.php";
include "layout/side.php";
include "layout/nav.php";

$produk = $koneksi->query("SELECT * FROM tb_produk")->num_rows;
$penghasilan = '';
$pelanggan = $koneksi->query("SELECT * FROM tb_users WHERE id_role = 1")->num_rows;
$komplain = $koneksi->query("SELECT * FROM tb_komplain")->num_rows;

?>
<div class="container-fluid">

	<h1 class="h3 mb-4 text-gray-800">HALLO SELAMAT DATANG DI FOOD COURT SELAMAT MENIKMATI</h1>
	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Produk</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $produk ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-cube fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penghasilan (1 Bulan)</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Pelanggan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pelanggan ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user-alt fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Komplain</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $komplain ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-comments fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Content Row -->

</div>

<?php include "layout/foot.php"; ?>