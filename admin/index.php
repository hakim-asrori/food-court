<?php
include "../function/bootstrap.php";
if (empty($_SESSION['admin'])) {
	include "../error/404-2.php";
	die();
}
include "layout/head.php";
include "layout/side.php";
include "layout/nav.php";
?>
<div class="container-fluid">

	<h1 class="h3 mb-4 text-gray-800">HALLO SELAMAT DATANG DI FOOD COURT SELAMAT MENIKMATI</h1>

</div>

<?php include "layout/foot.php"; ?>