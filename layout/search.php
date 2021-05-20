<?php

include "../../function/bootstrap.php";

if (isset($_GET['term'])) {
	$search = $_GET['term'];

	$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE nama LIKE '%$search%' ORDER BY nama ASC");

	while ($pecah = $ambil->fetch_assoc()) {
		$data[] = $pecah['nama'];
	}

	echo json_encode($data);
}