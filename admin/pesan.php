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
			case 'detail':
			include "page/pesan/detail.php";
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