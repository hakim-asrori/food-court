<?php
include "../function/bootstrap.php";
include "security.php";

include "layout/head.php";
include "layout/side.php";
include "layout/nav.php";
?>
<div class="container-fluid mb-5">
	<?php
	if (isset($_GET['page'])) {
		switch ($_GET['page']) {
			case "tambah":
			include "page/laporan/tambah.php";
			break;

			case "hapus":
			include "page/laporan/hapus.php";
			break;

			case "edit":
			include "page/laporan/edit.php";
			break;

			default:
			include "page/laporan/list.php";
			break;
		}
	} else {
		include "page/laporan/list.php";
	}

	?>
</div>

<?php include "layout/foot.php"; ?>