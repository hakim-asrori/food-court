<?php
$data = array();

if (isset($_POST['lihat'])) {
	$tglm = $_POST["tglm"];
	$tgls = $_POST["tgls"];
	
	$tgl_mulai = date("d", strtotime($tglm))." ".bulan(date("m", strtotime($tglm)))." ".date("Y", strtotime($tglm));
	$tgl_selesai = date("d", strtotime($tgls))." ".bulan(date("m", strtotime($tgls)))." ".date("Y", strtotime($tgls));

	$ambil = $koneksi->query("SELECT * FROM tb_checkout LEFT JOIN tb_users ON tb_checkout.id_user = tb_users.id_user WHERE tgl_beli BETWEEN '$tglm' AND '$tgls' ");
	while ($pecah = $ambil->fetch_assoc())
	{
		$data[] = $pecah;
	}
}
?>

<h1 class="h3 mb-3 text-gray-800">Laporan Pembelian <?= isset($_POST['lihat']) ? "Dari $tgl_mulai Hingga $tgl_selesai" : '' ?></h1>

<form method="post">
	<div class="row">
		<div class="col-sm-5">
			<label>Tanggal Mulai</label>
			<input type="date" class="form-control date" name="tglm" value="<?= $tglm ?>">
		</div>
		<div class="col-sm-5">
			<label>Tanggal Selesai</label>
			<input type="date" class="form-control date" name="tgls" value="<?= $tgls ?>">
		</div>
		<div class="col-sm-2">
			<label>&nbsp;</label>
			<br>
			<button class="btn btn-primary" name="lihat">Lihat Laporan</button>
		</div>
	</div>
</form>

<?php if (isset($data)): ?>
	<div class="card mt-3">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Pelanggan</th>
							<th>Tanggal</th>
							<th>Status</th>
							<th>Harga Belanjaan</th>
						</tr>
					</thead>
					<tbody>
						<?php $total=0; $i=1; ?>
						<?php foreach ($data as $key => $value): ?>
							<?php $total += $value['total_belanja'] ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $value["id_user"] ?></td>
								<td><?= date("d", strtotime($value['tgl_beli']))." ".bulan(date("m", strtotime($value['tgl_beli'])))." ".date("Y", strtotime($value['tgl_beli'])) ?></td>
								<td><?= $value["status"] ?></td>
								<td><?= harga($value["total_belanja"]) ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="4">Total Harga Keseluruhan</th>
							<th><?= harga($total) ?></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<?php endif ?>