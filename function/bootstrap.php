<?php
session_start();
$koneksi = new mysqli("localhost", "ifcfooud_hakim", "[q-4~tM47DBT","db_foodcourt");

// $koneksi = new mysqli("localhost", "root", "", "db_projek1_new");

date_default_timezone_set('Asia/Jakarta');


// Memebuat token CSRF
function createToken()
{
	$token = base64_encode(openssl_random_pseudo_bytes(32));
	$_SESSION['csrfvalue'] = $token;
	return $token;
}

// Menghapus token CSRF
function unsetToken()
{
	unset($_SESSION['csrfvalue']);
}

// Validasi token CSRF
function validationToken()
{
	$csrfvalue = $_SESSION['csrfvalue'];
	if (isset($_POST['csrf_name'])) {
		$value_input = $_POST['csrf_name'];
		if ($value_input == $csrfvalue) {
			unsetToken();
			return true;
		} else {
			unsetToken();
			return false;
		}
	} else {
		unsetToken();
		return false;
	}
}

// anti injek inputan
function anti_inject($text)
{
	$string = stripslashes(strip_tags(htmlentities(htmlspecialchars($text, ENT_QUOTES))));

	return $string;
}

// Membagi segment url
function uri_segment($uri = "")
{
	$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$uri_segments = explode('/', $uri_path);

	return $uri_segments[$uri];
}

// URL base
function base_url($folder = '')
{
	return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . "://" . $_SERVER['HTTP_HOST']  . "/" . $folder;
}

// Meredirect halaman
function redirect($uri = '', $method = '')
{
	$uri = base_url($uri);
	switch ($method) {
		case 'refresh':
		header('Refresh:0;url=' . $uri);
		break;
		default:
		header('Location: ' . $uri);
		break;
	}
	exit;
}

// Format harga
function harga($angka){
	
	$hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
	return $hasil_rupiah;
	
}

function bulan($bulan = "")
{
	switch ($bulan) {
		case 1: $bulan = 'Januari'; break;
		case 2: $bulan = 'Februari'; break;
		case 3: $bulan = 'Maret'; break;
		case 4: $bulan = 'April'; break;
		case 5: $bulan = 'Mei'; break;
		case 6: $bulan = 'Juni'; break;
		case 7: $bulan = 'Juli'; break;
		case 8: $bulan = 'Agustus'; break;
		case 9: $bulan = 'September'; break;
		case 10: $bulan = 'Oktober'; break;
		case 11: $bulan = 'November'; break;
		case 12: $bulan = 'Desember'; break;
		
		default: $bulan = 'Data Bulan Salah'; break;
	}

	return $bulan;

}