<?php
include "function/bootstrap.php";
if (!isset($_GET['status']) == 2) {
	include "assets/error/404-2.php"; die;
} elseif (empty($_GET['status'])) {
	include "assets/error/404-2.php"; die;
} elseif (empty($_GET['checkout'])) {
	include "assets/error/404-2.php"; die;
}

include "layout/head.php";
include "layout/nav.php";
include "layout/side.php";
include "layout/profil.php";
if (!isset($_SESSION['user'])) {
	echo "<script>alert('Silahkan login dulu');</script>";
	echo "<script>location='./login.php';</script>";
}
if ($users['id_user'] != $_SESSION['user']['id_user']) {
	include "assets/error/404-2.php"; die;
}

$id_checkout = anti_inject($_GET['checkout']);

$pembelian = $koneksi->query("SELECT tb_produk.id_produk, tb_produk.nama FROM tb_pembelian JOIN tb_produk ON tb_pembelian.id_produk = tb_produk.id_produk WHERE id_checkout = '$id_checkout'");

$isMobile = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));

if (isset($_POST['kirim'])) {
	$id_user = $users['id_user'];
	$pesan = $_POST['pesan'];

	$filename = $_FILES['foto']['name'];
	$ekstensi = array('png', 'jpg', 'jpeg');
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if (empty($filename)) {
		echo '<script>alert("Foto Struk tidak boleh kosong")</script>';
		echo '<script>location.reload()</script>';
	} else {
		if (!in_array($ext, $ekstensi)) {
			echo '<script>alert("Ekstensi terlarang")</script>';
		} else {
			$foto = sha1(rand() . "_" . $filename);
			move_uploaded_file($_FILES['foto']['tmp_name'], "./assets/images/struk/".$foto);

			$koneksi->query("INSERT INTO tb_komplain (id_user, id_checkout, tgl_komplain, foto, pesan, status) VALUES ('$id_user', '$id_checkout', current_timestamp, '$foto', '$pesan', 1)");

			$id_komplain = $koneksi->insert_id;

			foreach ($_POST['produk'] as $p) {
				$koneksi->query("INSERT INTO tb_komplain_produk VALUES('', '$id_komplain', '$p')");
			}

			echo "<script>alert('Saran berhasil dikirim');</script>";
			echo "<script>location='./riwayat.php';</script>";
		}
	}
}

?>
<input type="hidden" id="uri" value="<?= $uri ?>">
<h3>Saran</h3>

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
				<label for="foto">Foto Struk</label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="foto" name="foto" required>
						<label class="custom-file-label" for="foto">Choose file</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="pesan">Pesan</label>
				<textarea class="form-control" name="pesan" id="pesan" rows="10" required></textarea>
			</div>

			<div class="form-group">
				<button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
			</div>
		</form>

	</div>
</div>

<?php include "layout/foot.php"; ?>