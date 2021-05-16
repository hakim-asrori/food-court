<?php
include "../function/bootstrap.php";
include "layout/head.php";
include "layout/nav.php";
include "layout/side.php";
include "layout/profil.php";
if (!isset($_SESSION['user'])) {
	echo "<script>alert('Silahkan login dulu');</script>";
	echo "<script>location='/login.php';</script>";
}

if (isset($_POST['ubah_profil'])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$telepon = $_POST['telepon'];
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];

	$filename = $_FILES['foto']['name'];
	$ekstensi = array('png', 'jpg', 'jpeg');
	$ext = pathinfo($filename, PATHINFO_EXTENSION);


	$user = $koneksi->query("SELECT * FROM tb_users WHERE email = '$email'")->fetch_assoc();

	if (password_verify($password, $user['password'])) {
		if (empty($filename)) {
			$koneksi->query("UPDATE tb_users SET nama = '$nama', telepon = '$telepon', alamat = '$alamat' WHERE email = '$email'");
		} else {
			if (!in_array($ext, $ekstensi)) {
				$error_ext = "Ekstensi terlarang";
			} else {
				$foto = sha1(rand() . "_" . $filename);
				move_uploaded_file($_FILES['foto']['tmp_name'], "./assets/images/users/".$foto);
				unlink("./assets/images/users/".$users['foto']);
				$koneksi->query("UPDATE tb_users SET nama = '$nama', telepon = '$telepon', alamat = '$alamat', foto = '$foto' WHERE email = '$email'");

			}
		}
		echo '<script>alert("Akun berhasil diubah")</script>';
		echo '<script>location="./profil.php"</script>';
	} else {
		echo '<script>alert("Wrong password!")</script>';
	}

} elseif (isset($_POST['ubah_password'])) {
	$lama = $_POST['lama'];
	$baru1 = $_POST['baru1'];
	$baru2 = $_POST['baru2'];

	if (password_verify($lama, $users['password'])) {
		if ($baru1 != $baru2) {
			$msgPass = "This field password do not match!";
			echo '<script>alert("This field password do not match!")</script>';
		} else {
			$password = password_hash($baru1, PASSWORD_ARGON2I);
			$koneksi->query("UPDATE tb_users SET password = '$password' WHERE id_user = '$users[id_user]'");
			echo '<script>alert("Password berhasil diubah")</script>';
			echo '<script>location="./profil.php"</script>';
		}
	} else {
		echo '<script>alert("Wrong password!")</script>';
	}
}
?>
<input type="hidden" id="uri" value="<?= $uri ?>">
<h3>Profil Saya</h3>
<div class="card mb-3">
	<div class="card-body">

		<form action="" method="post" id="profil" enctype="multipart/form-data">
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" id="nama" name="nama" class="form-control disabled" disabled required value="<?= $users['nama'] ?>">
			</div>
			<div class="form-group">
				<label for="telepon">Telepon</label>
				<input type="text" id="telepon" name="telepon" class="form-control disabled" disabled required value="<?= $users['telepon'] ?>">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" id="email" class="form-control" name="email" readonly required value="<?= $users['email'] ?>">
			</div>
			<div class="form-group">
				<label for="foto">Foto Pengguna</label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" class="custom-file-input disabled" disabled id="foto" name="foto">
						<label class="custom-file-label" for="foto">Choose file</label>
					</div>
				</div>
			</div>
			<?php if ($users['foto'] != null): ?>
				<div class="form-group">
					<img src="/assets/images/users/<?= $users['foto'] ?>" height="200" width="200">
				</div>
			<?php endif ?>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea name="alamat" id="alamat" rows="3" class="form-control disabled" disabled required><?= $users['alamat'] ?></textarea>
			</div>
			<div class="form-group" id="konfirmasi" hidden>
				<label for="password">Konfirmasi Password</label>
				<input type="password" id="password" name="password" class="form-control" required>
			</div>
			<div class="form-group">
				<button class="btn btn-success" type="submit" name="ubah_profil" id="ubah_profil" hidden>Ubah Profil</button>
				<a href="#" class="btn btn-danger" id="batal" hidden>Batal</a>
				<a href="#" class="btn btn-warning" id="edit">Edit</a>
			</div>
		</form>

	</div>
</div>

<h3>Ubah Password</h3>

<div class="card mb-3">
	<div class="card-body">

		<form action="" method="post">
			<div class="form-group">
				<label for="lama">Password Lama</label>
				<input type="password" id="lama" name="lama" class="form-control">
			</div>

			<div class="form-group">
				<label for="baru1">Password Baru</label>
				<input type="password" id="baru1" name="baru1" class="form-control <?= isset($msgPass) ? 'is-invalid' : '' ?>">
				<?php if (isset($msgPass)): ?>
					<div class="invalid-feedback">
						<?= $msgPass ?>
					</div>
				<?php endif ?>
			</div>

			<div class="form-group">
				<label for="baru2">Konfirmasi Password Baru</label>
				<input type="password" id="baru2" name="baru2" class="form-control <?= isset($msgPass) ? 'is-invalid' : '' ?>">
				<?php if (isset($msgPass)): ?>
					<div class="invalid-feedback">
						<?= $msgPass ?>
					</div>
				<?php endif ?>
			</div>

			<div class="form-group">
				<input type="checkbox" onclick="lookPass()" class="ml-1" id="look" style="cursor: pointer;">
				<label for="look" style="cursor: pointer;">Lihat Password</label>
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="ubah_password">Ubah Password</button>
			</div>
		</form>

	</div>
</div>

<script>
	let btn = document.getElementById("edit");
	let btnUbah = document.getElementById('ubah_profil');
	let konfirmasi = document.getElementById('konfirmasi');
	let batal = document.getElementById('batal');

	let disable = document.getElementsByClassName('disabled');

	btn.addEventListener("click", function () {
		konfirmasi.hidden = false;
		batal.hidden = false;
		btnUbah.hidden = false;
		btn.hidden = true;
		for (let i = 0; i < disable.length; i++) {
			disable[i].disabled = false;
		}
	});

	batal.addEventListener("click", function () {
		konfirmasi.hidden = true;
		batal.hidden = true;
		btnUbah.hidden = true;
		btn.hidden = false;
		for (let i = 0; i < disable.length; i++) {
			disable[i].disabled = true;
		}
	});


	function lookPass() {
		let lama = document.getElementById('lama');
		let baru1 = document.getElementById('baru1');
		let baru2 = document.getElementById('baru2');
		if (lama.type === "password") {
			lama.type = "text";
			baru1.type = "text";
			baru2.type = "text";
		} else {
			lama.type = "password";
			baru1.type = "password";
			baru2.type = "password";
		}
	}
</script>

<?php include "layout/foot.php"; ?>