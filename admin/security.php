<?php
if (empty($_SESSION['admin'])) {
	include "../assets/error/404-2.php";
	die();
}
?>