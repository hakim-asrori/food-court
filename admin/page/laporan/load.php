<?php
include "../../../function/bootstrap.php";
$data = array();

$data2 = json_decode(file_get_contents("php://input"));

$tglm = $data2->tglm;
$tgls = $data2->tgls;

$ambil = $koneksi->query("SELECT * FROM tb_checkout LEFT JOIN tb_users ON tb_checkout.id_user = tb_users.id_user WHERE tgl_beli BETWEEN '$tglm' AND '$tgls' ");
$totalSeluruh = $koneksi->query("SELECT SUM(total_belanja) as 'total_belanja' FROM tb_checkout LEFT JOIN tb_users ON tb_checkout.id_user = tb_users.id_user WHERE tgl_beli BETWEEN '$tglm' AND '$tgls' ")->fetch_assoc();

while ($a = $ambil->fetch_assoc()) {
	$data[] = array(
		'pelanggan' => $a['nama_pemesan'],
		'tanggal' => $a['tgl_beli'],
		'status' => $a['status'],
		'total_belanja' => $a['total_belanja'],
		'total_seluruh' => $totalSeluruh['total_belanja']
	);
}

echo json_encode($data);

exit;