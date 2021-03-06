<?php 
include "function/bootstrap.php";
include "layout/head.php"; 
include "layout/nav.php"; 
include "layout/side.php"; 

if (isset($_POST['register'])) {
  $email = anti_inject($_POST['email']);
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];
  if (empty($email)) {
    $msgEmail = "This field email is required!";
  } elseif (empty($password1)) {
    $msgPass = "This field password is required!";
  } elseif (empty($password2)) {
    $msgPass = "This field repeat password is required!";
  } else {
    if ($password1 != $password2) {
      $msgPass = "This field password do not match!";
    } else {
      $ambil = $koneksi->query("SELECT * FROM tb_users WHERE email = '$email'")->fetch_assoc();
      if ($ambil['email'] == $email) {
        $msgEmail = "This email has already registered!";
      } else {
        $password = password_hash($password1, PASSWORD_ARGON2I);
        $koneksi->query("INSERT INTO tb_users (email, password, id_role) VALUES('$email', '$password', 2)");
        echo '<script>alert("Your account has been created")</script>';
        echo '<script>location="login.php"</script>';
      }

    }
  }
}
?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=PT+Mono&display=swap');
  button[name="login"] {
    width: 100px;
  }
  .card .card-body h2 {
    font-family: 'PT Mono', 'Nunito', monospace;
  }
</style>
<input type="hidden" id="uri" value="<?= $uri ?>">
<div class="row justify-content-center align-items-center mt-5">

  <div class="col-lg-7">
    <div class="card p-3 shadow-sm">
      <div class="card-body">
        <h2 class="text-uppercase text-center mb-5">Selamat Datang</h2>

        <form action="" method="post">
          <div class="form-group">
            <input type="email" class="form-control rounded-pill p-4 <?= isset($msgEmail) ? 'is-invalid' : '' ?>" placeholder="Email" name="email" id="email" value="<?= isset($email) ? $email : '' ?>">
            <?php if (isset($msgEmail)): ?>
              <div class="invalid-feedback">
                <?= $msgEmail ?>
              </div>
            <?php endif ?>
          </div>
          <div class="row">
            <div class="form-group col-sm-6">
              <input type="password" class="form-control rounded-pill p-4 <?= isset($msgPass) ? 'is-invalid' : '' ?>" placeholder="Password" name="password1" id="password1">
              <?php if (isset($msgPass)): ?>
                <div class="invalid-feedback">
                  <?= $msgPass ?>
                </div>
              <?php endif ?>
            </div>
            <div class="form-group col-sm-6">
              <input type="password" class="form-control rounded-pill p-4 <?= isset($msgPass) ? 'is-invalid' : '' ?>" placeholder="Repeat password" name="password2" id="password2">
            </div>
          </div>
          <div class="form-group">
            <input type="checkbox" onclick="lookPass()" class="ml-1" id="look" style="cursor: pointer;">
            <label for="look" style="cursor: pointer;">Lihat Password</label>
          </div>
          <div class="form-group text-center">
            <button type="submit" name="register" class="text-uppercase btn btn-primary rounded-pill px-3">Register</button>
          </div>
        </form>
        <div class="small text-center">
          <a href="./login.php">Jika sudah punya akun, silahkan login</a>
        </div>
      </div>
    </div>
  </div>

</div>
<script>
  function lookPass() {
    let pass1 = document.getElementById('password1');
    if (pass1.type === "password") {
      pass1.type = "text";
    } else {
      pass1.type = "password";
    }

    let pass2 = document.getElementById('password2');
    if (pass2.type === "password") {
      pass2.type = "text";
    } else {
      pass2.type = "password";
    }
  }
</script>
<?php include "layout/foot.php"; ?>
