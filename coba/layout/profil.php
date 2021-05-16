<?php
$id_users = $_SESSION['user']['id_user'];
$users = $koneksi->query("SELECT * FROM tb_users WHERE id_user='$id_users'")->fetch_assoc();

if (empty($users['nama'])) {
	redirect('profil.php','refresh');
}