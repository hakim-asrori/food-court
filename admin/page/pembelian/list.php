<?php
$i = 1;
$ambil = $koneksi->query("SELECT * FROM tb_checkout");
?>

<h1 class="h3 mb-3 text-gray-800 text-uppercase">Data Pembelian</h1>

<div class="table-responsive">
	<table class="table table-hover
	table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pembelian</th>
			<th>Tanggal</th>
			<th>Status Pembelian</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while ($p = $ambil->fetch_assoc()):
			$status = $koneksi->query("SELECT status FROM tb_status_produk WHERE id_status = '$p[status]'")->fetch_assoc();
			?>
			<tr>
				<th><?= $i++ ?></th>
				<td><?= $p['nama_pemesan'] ?></td>
				<td><?= date("d", strtotime($p['tgl_beli']))." ".bulan(date("m", strtotime($p['tgl_beli'])))." ".date("Y", strtotime($p['tgl_beli'])); ?></td>
				<td><?= $status['status'] ?></td>
				<td>
					<button onclick="location='./pembelian.php?page=detail&search=<?= $p['id_checkout'] ?>'" class="btn btn-info">Detail</button>
					<?php if ($p['status'] != 0): ?>
						<button class="btn btn-success">Pembayaran</button>
					<?php endif ?>
				</td>
			</tr>
		<?php endwhile ?>
	</tbody>
</table>
</div>