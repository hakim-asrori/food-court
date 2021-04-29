<?php
$slug = $_GET['search'];
$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE slug='$slug'")->fetch_assoc();

unlink("../assets/images/".$ambil['foto']);

$koneksi->query("DELETE FROM tb_produk WHERE slug='$ambil[slug]'");

echo "<script>alert('Produk berhasil dihapus');</script>";
echo "<script>location='".base_url('admin/produk.php')."';</script>";