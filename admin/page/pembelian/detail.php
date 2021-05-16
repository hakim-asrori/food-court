<?php
$i = 1;
$pembelian =  array();
$ambil = $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_checkout ON tb_pembelian.id_checkout = tb_checkout.id_checkout JOIN tb_produk ON tb_pembelian.id_produk = tb_produk.id_produk WHERE tb_pembelian.id_checkout = $_GET[search]");
while ($pecah = $ambil->fetch_assoc()) {
	$pembelian[] = $pecah;
}

$status = $koneksi->query("SELECT status FROM tb_status_produk WHERE id_status = ".$pembelian[0]['status']."")->fetch_assoc();
?>
<h1 class="h3 mb-3 text-gray-800 text-uppercase">Detail Pembelian</h1>

<a href="#" class="btn btn-danger m-b-10 btn-icon-split mb-4" onclick="history.back(-1)"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span><span class="text">Kembali</span></a>

<div class="row mb-3">
	<div class="col-md-4 mb-3">
		<h4>Pembelian</h4>
		<table>
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><?= date("d", strtotime($pembelian[0]['tgl_beli']))." ".bulan(date("m", strtotime($pembelian[0]['tgl_beli'])))." ".date("Y", strtotime($pembelian[0]['tgl_beli'])); ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td>:</td>
				<td><?= $status['status'] ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-4 mb-3">
		<h4>Pelanggan</h4>
		<table>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?= $pembelian[0]['nama_pemesan'] ?></td>
			</tr>
			<tr>
				<td>No. Telepon</td>
				<td>:</td>
				<td><?= $pembelian[0]['telepon_pemesan'] ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-4 mb-3">
		<h4>Pengiriman</h4>
		<table>
			<tr>
				<td><?= $pembelian[0]['alamat_pemesan'] ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Total Harga</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$totalBelanja = 0;
			foreach ($pembelian as $p):
				$totalHarga = $p['harga'] * $p['jumlah'];
				$totalBelanja += $totalHarga;
				?>
				<tr>
					<th><?= $i++ ?></th>
					<td><?= $p['nama'] ?></td>
					<td><?= harga($p['harga']) ?></td>
					<td><?= $p['jumlah'] ?></td>
					<td><?= harga($totalHarga) ?></td>
				</tr>
			<?php endforeach ?>
			<tr>
				<td colspan="4" align="center">Total Belanjaan</td>
				<td><?= harga($totalBelanja) ?></td>
			</tr>
		</tbody>
	</table>
</div>