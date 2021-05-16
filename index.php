<?php
include "./function/bootstrap.php";
include "layout/head.php";
include "layout/nav.php";
?>
<input type="hidden" id="uri" value="<?= uri_segment(1) ?>">
<div class="row">

	<?php include "home.php" ?>

</div>

<?php include "layout/foot.php"; ?>