<?php
include "function/bootstrap.php";
include "layout/head.php";
include "layout/nav.php";
include "layout/side.php";
if (!isset($_SESSION['user'])) {
  echo "<script>alert('Silahkan login dulu');</script>";
  echo "<script>location='./login.php';</script>";
} elseif (isset($_SESSION['user'])) {
  include "layout/profil.php";
}

$id_checkout = $koneksi->query("SELECT max(id_checkout) as 'id_checkout' FROM tb_checkout")->fetch_assoc();
$id_checkout = $id_checkout['id_checkout'];
$id_checkout = $id_checkout + 1;

if (isset($_POST['checkout'])) {
  $tgl_beli = date("Y-m-d");
  $nama_pemesan = $_POST['nama_konsumen'];
  $telepon_pemesan = $_POST['nomor_telepon'];
  $alamat_pemesan = $_POST['alamat'];
  $totalBelanja = 0;


  // $id_checkout = $koneksi->insert_id;
  $totalBelanja = 0;

  foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
    $ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk = '$id_produk'");
    $produk = $ambil->fetch_assoc();

    $totalHarga = $produk['harga']*$jumlah;
    $totalBelanja += $totalHarga;

    $koneksi->query("INSERT INTO tb_pembelian VALUES('', '$id_checkout', '$produk[id_produk]', '$jumlah')");
    echo "<script>alert('Produk telah di checkout, Harap lakukan pembayaran');</script>";
    echo "<script>location='riwayat.php';</script>";
  }

  $koneksi->query("INSERT INTO tb_checkout VALUES('', '$users[id_user]', '$nama_pemesan', '$telepon_pemesan', '$alamat_pemesan', '$totalBelanja', '$tgl_beli', '1')");

  unset($_SESSION['keranjang']);
}
?>
<input type="hidden" id="uri" value="<?= $uri ?>">
<h3>Checkout</h3>
<div class="alert alert-info">
  Silahkan Checkout
</div>
<div class="card mb-3">
  <div class="card-body">

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Makanan</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($_SESSION['keranjang'])): ?>
           <?php
           $i = 1;
           $totalBelanja = 0;
           foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
            $ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk = '$id_produk'");
            $produk = $ambil->fetch_assoc();
            $totalHarga = $produk['harga']*$jumlah;
            $totalBelanja += $totalHarga;
            ?>
            <tr>
              <th scope="row"><?= $i++ ?></th>
              <td><?= $produk['nama'] ?></td>
              <td><?= harga($produk['harga']) ?></td>
              <td>
                <div id="tambah_produk">
                  <div class="d-flex" id="btn">
                    <button class="badge-warning minus" id="minus" data-id="<?= $produk['id_produk'] ?>" data-isi="<?= $jumlah ?>"><i class="fas fa-minus"></i></button>
                    <?= $jumlah ?>
                    <button class="badge-primary plus" id="plus" data-id="<?= $produk['id_produk'] ?>"><i class="fas fa-plus"></i></button>
                  </div>
                </div>
              </td>
              <td><?= harga($totalHarga) ?></td>
            </tr>
          <?php } ?>
          <tr>
            <td colspan="4" align="center">Total Belanja</td>
            <td><?= harga($totalBelanja) ?></td>
          </tr>
          <?php else: ?>
            <tr>
              <td colspan="5" align="center">Tidak Ada Data Barang</td>
            </tr>
          <?php endif ?>
        </tbody>
      </table>
    </div>

    <?php if (!empty($_SESSION['keranjang'])): ?>
      <form method="post">
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <label class="form-label">Nama Konsumen</label>
              <input type="text" class="form-control" name="nama_konsumen" value="<?= $users['nama'] ?>" required readonly>
            </div>

          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label class="form-label">Nomer Telepon</label>
              <input type="number" class="form-control" name="nomor_telepon" value="<?= $users['telepon'] ?>" required minlength ="15" readonly>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <textarea name="alamat" class="form-control" cols="30" rows="5" required readonly><?= $users['alamat'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="checkout">Checkout</button>
        <a href="#" class="btn btn-warning" id="edit">Edit</a>
      </form>
    <?php endif ?>
  </div>
</div>
</div>


<?php include "layout/foot.php"; ?>
<script>
  let konsumen = document.querySelector("[name='nama_konsumen']");
  let telepon = document.querySelector("[name='nomor_telepon']");
  let alamat = document.querySelector("[name='alamat']");

  btnEdit = document.getElementById("edit");

  // console.log(alamat);
  
  btnEdit.addEventListener("click", function () {
    $(konsumen).removeAttr("readonly");
    $(telepon).removeAttr("readonly");
    $(alamat).removeAttr("readonly");
    btnEdit.hidden = true;
  });
</script>