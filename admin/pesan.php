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
			include "page/pesan/tambah.php";
			break;

			case "hapus":
			include "page/pesan/hapus.php";
			break;

			case "edit":
			include "page/pesan/edit.php";
			break;

			default:
			include "page/pesan/list.php";
			break;
		}
	} else {
		include "page/pesan/list.php";
	}

	?>
</div>

<?php include "layout/foot.php"; ?>