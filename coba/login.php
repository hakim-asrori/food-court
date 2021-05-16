<?php
include "../function/bootstrap.php"; 
include "layout/head.php";
include "layout/nav.php";
include "layout/side.php";

if (isset($_POST['login'])) {
	$account = anti_inject($_POST['account']);
	$password = $_POST['password'];

	if (empty($account)) {
		$msgAkun = "This field is required";
	} elseif (empty($password)) {
		$msgPass = "This field is required";
	} else {
		$ambil = $koneksi->query("SELECT * FROM tb_users WHERE email = '$account'")->fetch_assoc();

		if ($ambil) {
			if (password_verify($password, $ambil['password'])) {
				echo '<script>alert("Your account verified")</script>';
				if ($ambil['id_role'] == 99) {
					$_SESSION['admin'] = $ambil;
					redirect('admin','refresh');
				} elseif ($ambil['id_role'] == 88) {
					$_SESSION['kurir'] = $ambil;
					redirect('kurir','refresh');
				} else {
					$_SESSION['user'] = $ambil;
					if (empty($ambil['nama'])) {
						echo '<script>location="./profil.php"</script>';
					} elseif (empty($_SESSION['keranjang'])) {
						echo '<script>location="./"</script>';
					} elseif (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) {
						echo '<script>location="./checkout.php"</script>';
					} else {
						echo '<script>location="./riwayat.php"</script>';
					}
				}
			} else {
				echo '<script>alert("Wrong password!")</script>';
			}
		} else {
			echo '<script>alert("Email is not registered!")</script>';
		}
	}
}
?>
<style>
	@import url('https://fonts.googleapis.com/css2?family=PT+Mono&display=swap');
	button[name="login"] {
		width: 100px;
	}
	.card .card-body h2 {
		font-family: 'PT Mono', 'Nunito', monospace;
	}
</style>
<input type="hidden" id="uri" value="<?= $uri ?>">
<div class="row justify-content-center align-items-center mt-5">

	<div class="col-lg-6">
		<div class="card p-3 shadow-sm">
			<div class="card-body">
				<h2 class="text-uppercase text-center mb-5">Selamat Datang</h2>

				<form method="post">
					<div class="form-group">
						<input type="email" class="form-control rounded-pill p-4 <?= isset($msgAkun) ? 'is-invalid' : '' ?>" placeholder="Username atau email" name="account" id="account" value="<?= isset($account) ? $account : '' ?>">
						<?php if (isset($msgAkun)): ?>
							<div class="invalid-feedback">
								<?= $msgAkun ?>
							</div>
						<?php endif ?>
					</div>
					<div class="form-group">
						<input type="password" class="form-control rounded-pill p-4 <?= isset($msgPass) ? 'is-invalid' : '' ?>" placeholder="Password" name="password" id="password">
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
					<div class="form-group text-center">
						<button type="submit" name="login" class="text-uppercase btn btn-primary rounded-pill p-2">Login</button>
					</div>
				</form>
				<div class="small text-center">
					<a href="<?= base_url('registrasi.php'); ?>">Jika belum punya akun, silahkan registrasi terlebih dahulu</a>
				</div>
			</div>
		</div>
	</div>

</div>
<script>
	function lookPass() {
		let pass = document.getElementById('password');
		if (pass.type === "password") {
			pass.type = "text";
		} else {
			pass.type = "password";
		}
	}
</script>
<?php include "layout/foot.php"; ?>
