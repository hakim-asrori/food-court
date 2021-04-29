<?php
if (isset($_POST['simpan'])) {
	$nama = $_POST['nama'];
	$slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($nama)));
	$harga = $_POST['harga'];
	$filename = $_FILES['foto']['name'];
	$deskripsi = $_POST['deskripsi'];

	$ekstensi = array('png', 'jpg', 'jpeg');
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if (!in_array($ext, $ekstensi)) {
		$error_ext = "Ekstensi terlarang";
	} else {
		$foto = rand() . "_" . $filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/images/".$foto);

		$koneksi->query("INSERT INTO tb_produk (nama, slug, harga, deskripsi, foto) VALUES('$nama', '$slug', '$harga', '$deskripsi', '$foto')");

		echo "<script>alert('Produk berhasil ditambahkan');</script>";
		echo "<script>location='".base_url('admin/produk.php')."';</script>";
	}
}
?>

<h1 class="h3 mb-3 text-gray-800 text-uppercase">Tambah Produk</h1>

<a href="#" class="btn btn-danger m-b-10 btn-icon-split mb-4" onclick="history.back(-1)"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span><span class="text">Kembali</span></a>

<form action="" enctype="multipart/form-data" method="post">
	<div class="form-group row">
		<label class="col-sm-2">Nama Makanan</label>
		<div class="col-sm">
			<input type="text" name="nama" class="form-control" required>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-2">Harga</label>
		<div class="col-sm">
			<input type="number" name="harga" class="form-control" required>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-2">Upload Gambar Makanan</label>
		<div class="col-sm">
			<div class="input-group mb-3">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="foto" required name="foto">
					<label class="custom-file-label" for="foto">Choose file</label>
				</div>
			</div>
			<div class="small text-danger mt-0">
				<?php if (isset($error_ext)): ?>
					<?= $error_ext ?><br>
					* ekstensi yang boleh .png, .jpg, .png
					<?php else: ?>
						* ekstensi gambar .png, .jpg, .png
					<?php endif ?>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">Deskripsi</label>
			<div class="col-sm">
				<textarea name="deskripsi" class="form-control" cols="30" rows="3"></textarea>
			</div>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary m-b-10 btn-icon-split mb-4" name="simpan"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span></button>
			<button type="reset" class="btn btn-warning m-b-10 btn-icon-split mb-4"><span class="icon text-white-50"><i class="fas fa-sync-alt"></i></span><span class="text">Reset</span></button>
		</div>
	</form>