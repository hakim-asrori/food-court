<?php
include "../../function/bootstrap.php";
include "../layout/head.php";
include "../layout/side.php";
include "../layout/nav.php";
?>
<div class="container-fluid">
	<?php
	if (isset($_GET['page'])) {
		if ($_GET['page'] == "tambah") {
			include "produk/tambah.php";
		}
	} else {
		include "produk/list.php";
	}
	?>
</div>

<?php include "../layout/foot.php"; ?>