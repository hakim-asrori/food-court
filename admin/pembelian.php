<?php
include "../function/bootstrap.php";
include "security.php";
if (isset($_GET['page'])) {
	if ($_GET['page'] == 'antar') {
		$data = json_decode(file_get_contents("php://input"));

		$id_checkout = $data->id_checkout;

		$query = $koneksi->query("UPDATE tb_checkout SET status = 2 WHERE id_checkout ='$id_checkout'");

		if ($query) {
			echo 1;
		} else {
			echo 2;
		}

		exit();
	}
}

include "layout/head.php";
include "layout/side.php";
include "layout/nav.php";
?>
<div class="container-fluid">
	<?php
	if (isset($_GET['page'])) {
		switch ($_GET['page']) {
			case "detail":
			include "page/pembelian/detail.php";
			break;

			case "pembayaran":
			include "page/pembelian/pembayaran.php";
			break;

			default:
			include "page/pembelian/list.php";
			break;
		}
	} else {
		include "page/pembelian/list.php";
	}

	?>
</div>

<?php include "layout/foot.php"; ?>