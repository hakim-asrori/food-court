<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "db_projek1_new");

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
	return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . "/" . uri_segment(1) . "/" . $folder;
}

// URL CSS
function css_url($folder = '')
{
	return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . "/" . uri_segment(1) . "/css.php/" . $folder;
}

// URL CSS
function plugin_url($folder = '')
{
	return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . "/" . uri_segment(1) . "/plugins.php/" . $folder;
}

// URL js
function js_url($folder = '')
{
	return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . "/" . uri_segment(1) . "/javascript.php/" . $folder;
}

// URL images
function image_url($folder = '')
{
	return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . "/" . uri_segment(1) . "/images.php/" . $folder;
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
