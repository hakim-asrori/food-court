<?php
$ambil = $koneksi->query("SELECT * FROM tb_produk");
?>

<h1 class="h3 mb-3 text-gray-800 text-uppercase">Data Produk</h1>

<a href="<?= base_url('admin/produk.php?page=tambah'); ?>" class="btn btn-primary m-b-10 btn-icon-split mb-4"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Produk</span></a>

<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th scope="row">No.</th>
				<th scope="row">Nama Makanan</th>
				<th scope="row">Harga</th>
				<th scope="row">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; while ($a = $ambil->fetch_assoc()): ?>
			<tr>
				<th scope="col"><?= $no++ ?></th>
				<td><?= $a['nama'] ?></td>
				<td><?= harga($a['harga']) ?></td>
				<td>
					<a href="<?= base_url('detail.php?search='.$a['slug']); ?>" class="badge badge-success" target="blank">Detail</a>
					<a href="<?= base_url('admin/produk.php?page=edit&search='.$a['slug']); ?>" class="badge badge-warning">Edit</a>
					<a href="<?= base_url('admin/produk.php?page=hapus&search='.$a['slug']); ?>" class="badge badge-danger">Hapus</a>
				</td>
			</tr>
		<?php endwhile ?>
	</tbody>
</table>
</div>