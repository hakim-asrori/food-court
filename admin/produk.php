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
			case "tambah":
			include "page/produk/tambah.php";
			break;

			case "hapus":
			include "page/produk/hapus.php";
			break;

			case "edit":
			include "page/produk/edit.php";
			break;

			default:
			include "page/produk/list.php";
			break;
		}
	} else {
		include "page/produk/list.php";
	}

	?>
</div>

<?php include "layout/foot.php"; ?>