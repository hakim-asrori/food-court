<?php 
session_start();
if (isset($_GET['page'])) {
	$id_produk = $_GET['id'];
	switch ($_GET['page']) {
		case "tambah":
		if (isset($_SESSION['keranjang'][$id_produk])) {
			$_SESSION['keranjang'][$id_produk]+=1;
		} else {
			$_SESSION['keranjang'][$id_produk] = 1;
		}
		echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
		echo "<script>location='keranjang.php';</script>";
		break;

		case "hapus":
		unset($_SESSION["keranjang"][$id_produk]);

		echo "<script>alert('Produk dihapus dari keranjang');</script>";
		echo "<script>location='keranjang.php';</script>";
		break;
		
		default:
		include "./assets/error/404-2.php";
		break;
	}
} else {
	include "./assets/error/404-2.php";
}
?>