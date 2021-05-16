<?php
$produk = $koneksi->query("SELECT * FROM tb_produk ORDER BY id_produk DESC");
while ($p = $produk->fetch_assoc()) {
	$pembelian = $koneksi->query("SELECT jumlah, COUNT(id_produk) as 'produk' FROM tb_pembelian WHERE id_produk = '$p[id_produk]'")->fetch_assoc();
	?>
	<div class="col-lg-3 col-md-4 col-sm-6 mb-3" id="produk">
		<div class="card shadow-sm">
			<div class="_card-body">
				<img src="<?= "/assets/images/".$p['foto'] ?>" alt="<?= $p['nama'] ?>">
				<div class="_card-text">
					<p class="font-weight-bold ml-3 mt-2 h5 text-primary"><?= $p['nama'] ?></p>
					<p class="ml-3 my-0"><?= harga($p['harga']) ?></p>
					<div class="ml-3 text-warning mb-3">
						<?= $pembelian['produk']*$pembelian['jumlah'] ?> x dibeli
					</div>
				</div>
			</div>
			<div class="card-footer text-center">
				<form method="post" action="/beli.php?page=tambah&id=<?= $p['id_produk'] ?>" class="d-inline">
					<button class="btn btn-success">Beli</button>
				</form>
				<a href="<?= base_url('detail.php?search='.$p['slug']); ?>" class="btn btn-primary">Detail</a>
			</div>
		</div>
	</div>
	<?php } ?>