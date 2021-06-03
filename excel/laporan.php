<?php
include "../function/bootstrap.php";


$tglm = $_POST['tglm'];
$tgls = $_POST['tgls'];

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Andon Mangan $tglm sampai $tgls.xls");

$ambil = $koneksi->query("SELECT * FROM tb_checkout LEFT JOIN tb_users ON tb_checkout.id_user = tb_users.id_user WHERE tgl_beli BETWEEN '$tglm' AND '$tgls' ");
$totalSeluruh = $koneksi->query("SELECT SUM(total_belanja) as 'total_belanja' FROM tb_checkout LEFT JOIN tb_users ON tb_checkout.id_user = tb_users.id_user WHERE tgl_beli BETWEEN '$tglm' AND '$tgls' ")->fetch_assoc(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	<div class="table-responsive">
		<table class="table table-bordered" border="1">
			<thead>
				<tr>
					<th>No</th>
					<th>Pelanggan</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Total Belanja</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				while ($a = $ambil->fetch_assoc()) { ?>
					<tr>
						<th><?= $no++ ?></th>
						<td><?= $a['nama_pemesan'] ?></td>
						<td><?= $a['tgl_beli'] ?></td>
						<td><?= $a['status'] ?></td>
						<td><?= $a['total_belanja'] ?></td>
					</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">Total Harga Keseluruhan</th>
					<th><?= $totalSeluruh['total_belanja'] ?></th>
				</tr>
			</tfoot>
		</table>
	</div>

</body>
</html>
