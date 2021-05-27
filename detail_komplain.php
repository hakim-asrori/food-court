<?php
include "function/bootstrap.php";
include "layout/head.php";
include "layout/nav.php";
include "layout/side.php";
include "layout/profil.php";
if (!isset($_SESSION['user'])) {
  echo "<script>alert('Silahkan login dulu');</script>";
  echo "<script>location='./login.php';</script>";
}
if ($users['id_user'] != $_SESSION['user']['id_user']) {
  include "assets/error/404-2.php"; die;
}
?>
<input type="hidden" id="uri" value="<?= $uri ?>">

<h3>Detail Komplain</h3>

<div class="card mt-3">
  <div class="card-body">
    
    
    
  </div>
</div>
<?php include "layout/foot.php"; ?>