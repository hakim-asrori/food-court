<?php
$produk = $koneksi->query("SELECT * FROM tb_produk");
while ($p = $produk->fetch_assoc()) {
	$pembelian = $koneksi->query("SELECT * FROM tb_pembelian WHERE id_produk = '$p[id_produk]'")->num_rows;
	?>
	<div class="col-lg-3 col-md-4 col-sm-6 mb-3" id="produk">
		<div class="card shadow-sm">
			<!-- <a href="" data-lightbox="image-1" data-title="My caption"> -->
				<!-- </a> -->
				<div class="_card-body">
					<img src="<?= "/images/".$p['foto'] ?>" alt="">
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
					<a href="<?= base_url('detail/'.$p['slug']); ?>" class="btn btn-primary">Detail</a>
				</div>
			</div>
		</div>
		<?php } ?>