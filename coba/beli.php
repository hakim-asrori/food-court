<?php 
include "../function/bootstrap.php";
if (isset($_GET['page'])) {
	if (isset($_GET['id'])) {
		$id_produk = $_GET['id'];
		$produk = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk = '$id_produk'")->fetch_assoc();
		switch ($_GET['page']) {

			// Tambah Produk
			case "tambah":
			if ($produk) {
				if (isset($_SESSION['keranjang'][$produk['id_produk']])) {
					$_SESSION['keranjang'][$produk['id_produk']] += 1;
				} else {
					$_SESSION['keranjang'][$produk['id_produk']] = 1;
				}
				echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
				echo "<script>location='./keranjang.php';</script>";
			} else {
				include "./assets/error/404-2.php";
			}
			break;

			// Kurangi Produk
			case "kurang":
			$isi = $_GET['isi'];
			if ($produk) {
				if ($isi == 1) {
					unset($_SESSION["keranjang"][$produk['id_produk']]);
				} else {
					if (isset($_SESSION['keranjang'][$produk['id_produk']])) {
						$_SESSION['keranjang'][$produk['id_produk']] -= 1;
					} else {
						$_SESSION['keranjang'][$produk['id_produk']] = 1;
					}
				}
			} else {
				include "./assets/error/404-2.php";
			}
			break;

			// Hapus Produk
			case "hapus":
			unset($_SESSION["keranjang"][$produk['id_produk']]);

			echo "<script>alert('Produk dihapus dari keranjang');</script>";
			echo "<script>location='./keranjang.php';</script>";
			break;

			default:
			include "./assets/error/404-2.php";
			break;
		}
	} else {
		include "./assets/error/404-2.php";
	}
} else {
	include "./assets/error/404-2.php";
}
?>