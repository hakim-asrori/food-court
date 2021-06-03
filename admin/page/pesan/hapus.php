<?php
include "../../../function/bootstrap.php";

$id = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM tb_komplain WHERE id_komplain = $id")->fetch_assoc();

$data = $koneksi->query("DELETE FROM tb_komplain WHERE id_komplain = $id");
$koneksi->query("DELETE FROM tb_komplain_produk WHERE id_komplain = $id");
unlink("../../../assets/images/struk/".$ambil['foto']);

if($data){
	echo 1; 
}else{
	echo 0;
}

exit;
?>
