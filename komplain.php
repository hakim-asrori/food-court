<?php
include "./function/bootstrap.php";
include "layout/head.php";
include "layout/nav.php";
include "layout/profil.php";

if (!isset($_GET['status']) == 4) {
	include "assets/error/404-2.php"; die;
} elseif (empty($_GET['status'])) {
	include "assets/error/404-2.php"; die;
} elseif (empty($_GET['checkout'])) {
	include "assets/error/404-2.php"; die;
}

if ($users['id_user'] != $_SESSION['user']['id_user']) {
	include "assets/error/404-2.php"; die;
}

if (!isset($_SESSION['user'])) {
	echo "<script>alert('Silahkan login dulu');</script>";
	echo "<script>location='/login.php';</script>";
}

$pembelian = $koneksi->query("SELECT tb_produk.id_produk, tb_produk.nama FROM tb_pembelian JOIN tb_produk ON tb_pembelian.id_produk = tb_produk.id_produk WHERE id_checkout = ".anti_inject($_GET['checkout'])."");

$isMobile = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));

if (isset($_POST['kirim'])) {
	echo "<pre>";
	print_r($_POST['nama']);
	echo "</pre>";
	echo "<pre>";
	print_r($_POST['pesan']);
	echo "</pre>";
	echo "<pre>";
	print_r($_FILES['foto']);
	echo "</pre>";
	foreach ($_POST['produk'] as $p) {
		echo "<pre>";
		print_r(unserialize(serialize($p)));
		echo "</pre>";
	}
	die;
}

?>
<input type="hidden" id="uri" value="<?= uri_segment(1) ?>">
<h3>Komplain</h3>

<div class="card">
	<div class="card-body">

		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" name="nama" class="form-control" id="nama" value="<?= $users['nama'] ?>">
			</div>

			<div class="form-group">
				<label for="produk">Nama Produk</label>
				<select name="produk[]" id="produk" class="form-control" required multiple>
					<?php while ($p = $pembelian->fetch_assoc()): ?>
						<option value="<?= $p['id_produk'] ?>"><?= $p['nama'] ?></option>
					<?php endwhile ?>
				</select>
				<?php if (!$isMobile): ?>
					<div class="small mt-3 text-danger">* Bagi pengguna Komputer/Laptop/PC harap tekan tombol ctrl/command agar dapat memilih lebih dari 1 Produk</div>
				<?php endif ?>
			</div>

			<div class="form-group">
				<label for="foto">Foto bukti pembayaran</label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="foto" name="foto">
						<label class="custom-file-label" for="foto">Choose file</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="pesan">Pesan</label>
				<textarea class="form-control" name="pesan" id="pesan" rows="10"></textarea>
			</div>

			<div class="form-group">
				<button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
			</div>
		</form>

	</div>
</div>

<?php include "layout/foot.php"; ?>