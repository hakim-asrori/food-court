<?php
include "../../../function/bootstrap.php";

$data = array();

$ambil = $koneksi->query("SELECT tk.*, tc.nama_pemesan, tc.telepon_pemesan, tc.tgl_beli FROM tb_komplain tk JOIN tb_checkout tc ON tk.id_checkout = tc.id_checkout");

while ($a = $ambil->fetch_assoc()) {
	$tgl_komplain = date("d", strtotime($a['tgl_komplain']))." ".bulan(date("m", strtotime($a['tgl_komplain'])))." ".date("Y", strtotime($a['tgl_komplain']));
	$tgl_beli = date("d", strtotime($a['tgl_beli']))." ".bulan(date("m", strtotime($a['tgl_beli'])))." ".date("Y", strtotime($a['tgl_beli']));
	
	$data[] = array(
		'id' => $a['id_komplain'],
		'pelanggan' => $a['nama_pemesan'],
		'tgl_beli' => $tgl_beli,
		'tgl_komplain' => $tgl_komplain,
		'status' => $a['status']
	);
}

echo json_encode($data);

exit;