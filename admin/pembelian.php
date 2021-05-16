<?php
include "../function/bootstrap.php";
include "security.php";

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