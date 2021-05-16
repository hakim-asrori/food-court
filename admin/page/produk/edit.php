<?php if ($_GET['search']): ?>
	<?php
	$slug = $_GET['search'];
	$produk = $koneksi->query("SELECT * FROM tb_produk WHERE slug='$slug'")->fetch_assoc();

	if (isset($_POST['simpan'])) {
		$nama = $_POST['nama'];
		$slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($nama)));
		$harga = $_POST['harga'];
		$filename = $_FILES['foto']['name'];
		$deskripsi = $_POST['deskripsi'];

		$ekstensi = array('png', 'jpg', 'jpeg');
		$ext = pathinfo($filename, PATHINFO_EXTENSION);

		if (empty($filename)) {
			$koneksi->query("UPDATE tb_produk SET nama = '$nama', slug = '$slug', harga = '$harga', deskripsi = '$deskripsi' WHERE id_produk = '$produk[id_produk]'");

			echo "<script>alert('Produk berhasil diubah');</script>";
			echo "<script>location='".base_url('admin/produk.php')."';</script>";
		} else {
			if (!in_array($ext, $ekstensi)) {
				$error_ext = "Ekstensi terlarang";
			} else {
				$foto = sha1(rand() . "_" . $filename);
				move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/images/".$foto);
				unlink("../assets/images/".$produk['foto']);
				$koneksi->query("UPDATE tb_produk SET nama = '$nama', slug = '$slug', harga = '$harga', deskripsi = '$deskripsi', foto = '$foto' WHERE id_produk = '$produk[id_produk]'");

				echo "<script>alert('Produk berhasil diubah');</script>";
				echo "<script>location='".base_url('admin/produk.php')."';</script>";
			}
		}
	}
	?>
	<h1 class="h3 mb-3 text-gray-800 text-uppercase">Edit Produk</h1>

	<a href="#" class="btn btn-danger m-b-10 btn-icon-split mb-4" onclick="history.back(-1)"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span><span class="text">Kembali</span></a>

	<form action="" enctype="multipart/form-data" method="post">
		<div class="form-group row">
			<label class="col-sm-2">Nama Makanan</label>
			<div class="col-sm">
				<input type="text" name="nama" class="form-control" required value="<?= $produk['nama'] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">Harga</label>
			<div class="col-sm">
				<input type="number" name="harga" class="form-control" required value="<?= $produk['harga'] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">Upload Gambar Makanan</label>
			<div class="col-sm-10">
				<div class="input-group mb-3">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="foto" name="foto">
						<label class="custom-file-label" for="foto">Choose file</label>
					</div>
				</div>
				<div class="small text-danger mt-0">
					<?php if (isset($error_ext)): ?>
						<?= $error_ext ?><br>
						* ekstensi yang boleh .png, .jpg, .jpeg
						<?php else: ?>
							* ekstensi gambar .png, .jpg, .jpeg
						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2"></label>
				<div class="col-sm">
					<img src="<?= "/assets/images/".$produk['foto'] ?>" width="250">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2">Deskripsi</label>
				<div class="col-sm">
					<textarea name="deskripsi" class="form-control" cols="30" rows="5"><?= $produk['deskripsi'] ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary m-b-10 btn-icon-split mb-4" name="simpan"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span></button>

				<button type="reset" class="btn btn-warning m-b-10 btn-icon-split mb-4"><span class="icon text-white-50"><i class="fas fa-sync-alt"></i></span><span class="text">Reset</span></button>
			</div>
		</form>
		<?php else: ?>
			<?php include "tambah.php"; ?>
		<?php endif ?>
