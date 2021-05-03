<?php
include "function/bootstrap.php";
include "layout/head.php";
include "layout/nav.php";
if (!isset($_SESSION['user'])) {
  echo "<script>alert('Silahkan login dulu');</script>";
  echo "<script>location='/login.php';</script>";
}

if (isset($_POST['checkout'])) {
  $id_user = $_SESSION['user']['id_user'];
  $tgl_beli = time();
  $nama = $_POST['nama_konsumen'];
  $telepon = $_POST['nomor_telepon'];
  $alamat = $_POST['alamat'];
  $totalBelanja = 0;

  foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
    $ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk = '$id_produk'");
    $produk = $ambil->fetch_assoc();
    $totalHarga = $produk['harga']*$jumlah;
    $totalBelanja += $totalHarga;

    $koneksi->query("INSERT INTO tb_pembelian VALUES('', '$id_user', '$id_produk', '$nama', '$telepon', '$alamat', '$jumlah', '$totalBelanja', '$tgl_beli')");
  }

  unset($_SESSION['keranjang']);
}
?>
<div class="container">
  <h3>Checkout</h3>
  <div class="alert alert-info">
    Silahkan Checkout
  </div>
  <div class="card">
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
              <td><?= $jumlah ?></td>
              <td><?= harga($totalHarga) ?></td>
            </tr>
          <?php } ?>
          <tr>
            <td colspan="4" align="center">Total Belanja</td>
            <td><?= harga($totalBelanja) ?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <form method="post">
      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="form-label">Nama Konsumen</label>
            <input type="text" class="form-control" name="nama_konsumen" required>
          </div>

        </div>
        <div class="col-sm-6">
          <div class="mb-3">
            <label class="form-label">Nomer Telepon</label>
            <input type="number" class="form-control" name="nomor_telepon" required>
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" cols="30" rows="5" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="checkout">Checkout</button>
    </form>
  </div>
</div>
</div>
</div>


<?php include "layout/foot.php"; ?>
