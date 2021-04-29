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
		if ($_GET['page'] == "tambah") {
			include "page/produk/tambah.php";
		} elseif ($_GET['page'] == "hapus") {
			include "page/produk/hapus.php";
		}
	} else {
		include "page/produk/list.php";
	}
	?>
</div>

<?php include "layout/foot.php"; ?>