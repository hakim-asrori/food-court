<?php
include "./function/bootstrap.php";
include "layout/head.php";
include "layout/nav.php";

if (isset($_GET['search'])) {
	$slug = $_GET['search'];
	$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE slug='$slug'")->fetch_assoc();

	$pembelian = $koneksi->query("SELECT * FROM tb_pembelian WHERE id_produk = '$ambil[id_produk]'")->num_rows;
}
?>
<style>
	.card .card-body {
		padding: .5rem;
	}
</style>
<input type="hidden" id="uri" value="<?= uri_segment(1) ?>">
<div class="card mb-3">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-5 col-lg-4">
				<img src="<?= "/assets/images/".$ambil['foto'] ?>" alt="<?= $ambil['nama'] ?>" width="100%" class="mb-3">
			</div>
			<div class="col-sm-7 col-lg-8">
				<p class="">Nama Makanan : <?= $ambil['nama'] ?></p>
				<p>Harga : <?= harga($ambil['harga']) ?></p>
				<p>Penjualan : <?= $pembelian ?> x dibeli</p>
				<div class="">
					<p>Deskripsi</p>
					<p><?= $ambil['deskripsi'] ?></p>
				</div>
				<div class="mb-3">
					<form method="post" action="/beli.php?page=tambah&id=<?= $ambil['id_produk'] ?>" class="d-inline">
						<button class="btn btn-success">Beli</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">

	<?php
	$produk = $koneksi->query("SELECT * FROM tb_produk ORDER BY id_produk DESC LIMIT 20");
	while ($p = $produk->fetch_assoc()) {
		$pembelian = $koneksi->query("SELECT * FROM tb_pembelian WHERE id_produk = '$p[id_produk]'")->num_rows;
		?>
		<div class="col-lg-3 col-md-4 col-sm-6 mb-3" id="produk">
			<div class="card shadow-sm">
				<div class="_card-body">
					<img src="<?= "/assets/images/".$p['foto'] ?>" alt="<?= $p['nama'] ?>">
					<div class="_card-text">
						<p class="font-weight-bold ml-3 mt-2 h5 text-primary"><?= $p['nama'] ?></p>
						<p class="ml-3 my-0"><?= harga($p['harga']) ?></p>
						<div class="ml-3 text-warning mb-3">
							<?= $pembelian ?> x dibeli
						</div>
					</div>
				</div>
				<div class="card-footer text-center">
					<button class="btn btn-success">Beli</button>
					<a href="<?= base_url('detail.php?search='.$p['slug']); ?>" class="btn btn-primary">Detail</a>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<a href="<?= base_url('./'); ?>" class="btn btn-primary mb-5">View More</a>
<?php include "layout/foot.php"; ?>