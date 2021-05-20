<?php
include "function/bootstrap.php";
include "layout/head.php";
include "layout/nav.php";
include "layout/side.php";

$search = anti_inject($_GET['search']);
$cari = $koneksi->query("SELECT * FROM tb_produk WHERE nama LIKE '%$search%'");
?>
<input type="hidden" id="uri" value="<?= $uri ?>">

<h3 class="h4 mb-4">Hasil Pencarian : <?= $search ?></h3>

<div class="row">

	<?php
	while ($c = $cari->fetch_assoc()) {
		$pembelian = $koneksi->query("SELECT jumlah, COUNT(id_produk) as 'produk' FROM tb_pembelian WHERE id_produk = '$c[id_produk]'")->fetch_assoc();
		?>
		<div class="col-lg-3 col-md-4 col-sm-6 mb-3" id="produk">
			<div class="card shadow-sm">
				<div class="_card-body">
					<img src="<?= "/assets/images/".$c['foto'] ?>" alt="<?= $c['nama'] ?>">
					<div class="_card-text">
						<p class="font-weight-bold ml-3 mt-2 h5 text-primary"><?= $c['nama'] ?></p>
						<p class="ml-3 my-0"><?= harga($c['harga']) ?></p>
						<div class="ml-3 text-warning mb-3">
							<?= $pembelian['produk']*$pembelian['jumlah'] ?> x dibeli
						</div>
					</div>
				</div>
				<div class="card-footer text-center">
					<form method="post" action="/beli.php?page=tambah&id=<?= $c['id_produk'] ?>" class="d-inline">
						<button class="btn btn-success">Beli</button>
					</form>
					<a href="<?= base_url('detail.php?search='.$c['slug']); ?>" class="btn btn-primary">Detail</a>
				</div>
			</div>
		</div>
		<?php
	}
	?>

</div>

<?php include "layout/foot.php"; ?>