<?php
include "function/bootstrap.php";
include "layout/head.php";
include "layout/nav.php";
include "layout/side.php";
include "layout/profil.php";

if (!isset($_SESSION['user'])) {
	echo "<script>alert('Silahkan login dulu');</script>";
	echo "<script>location='./login.php';</script>";
}
if (isset($_POST['sampai'])) {
	$koneksi->query("UPDATE tb_checkout SET status = 4 WHERE id_checkout = '$_POST[checkout]'");
	echo "<script>alert('Pesan di terima.');</script>";
	echo "<script>location='./riwayat.php';</script>";
}
?>
<input type="hidden" id="uri" value="<?= $uri ?>">
<h3>Riwayat Belanja</h3>
<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th>Total</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$ambil = $koneksi->query("SELECT * FROM tb_checkout WHERE id_user = '$users[id_user]'");
					while ($a = $ambil->fetch_assoc()) {
						$tgl_beli = date("d", strtotime($a['tgl_beli']))." ".bulan(date("m", strtotime($a['tgl_beli'])))." ".date("Y", strtotime($a['tgl_beli']));
						$status = $koneksi->query("SELECT status FROM tb_status_produk WHERE id_status = '$a[status]'")->fetch_assoc();
						?>
						<tr>
							<th><?= $i++ ?></th>
							<td><?= $tgl_beli;  ?></td>
							<td>
								<?php
								switch ($a['status']) {
									case 1:
									echo '<p class="badge badge-danger">'.$status['status'].'</p>';
									break;

									case 2:
									echo '<p class="badge badge-info">'.$status['status'].'</p>';
									break;

									case 3:
									echo '<p class="badge badge-primary">'.$status['status'].'</p>';
									break;

									case 4:
									echo '<p class="badge badge-success">'.$status['status'].'</p>';
									break;
									
									default:
									echo '<p class="badge badge-danger">'.$status['status'].'</p>';
									break;
								}
								?>
							</td>
							<td><?= harga($a['total_belanja']) ?></td>
							<td>
								<?php if ($a['status'] == 3): ?>
									<form method="post" class="d-inline">
										<input type="hidden" name="checkout" value="<?= $a['id_checkout'] ?>">
										<button name="sampai" class="btn btn-success">Sudah di Terima?</button>
									</form>
								<?php endif ?>
								<?php if ($a['status'] == 4): ?>
									<?php
									$komplain = $koneksi->query("SELECT * FROM tb_komplain WHERE id_checkout = '$a[id_checkout]'")->num_rows;
									?>
									<?php if ($komplain < 1): ?>
										<a href="./komplain.php?status=4&checkout=<?= $a['id_checkout'] ?>" class="btn btn-danger" id="count">Komplain</a>
										<?php else: ?>
											<a href="./detail_komplain.php?checkout=<?= $a['id_checkout'] ?>" class="btn btn-info" id="count">Detail Komplain</a>
										<?php endif ?>
									<?php endif ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php include "layout/foot.php"; ?>