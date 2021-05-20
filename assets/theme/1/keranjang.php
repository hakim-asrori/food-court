<?php
include "function/bootstrap.php";
include "layout/head.php";
include "layout/nav.php";

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
  echo "<script>alert('Keranjang kosong, silahkan belanja terlebih dahulu');</script>";
  echo "<script>location='/';</script>";
}
?>
<input type="hidden" id="uri" value="<?= uri_segment(1) ?>">

<div class="alert alert-danger">
  Data keranjang akan hilang jika Browser anda di tutup.
</div>

<h3>Isi Keranjang</h3>
<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Makanan</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
            $ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk = '$id_produk'");
            $produk = $ambil->fetch_assoc();
            $totalHarga = $produk['harga']*$jumlah; ?>
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
              <td>
                <form method="post" action="/beli.php?page=hapus&id=<?= $produk['id_produk'] ?>" class="d-inline">
                  <button class="btn btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <button type="button" class="btn btn-secondary" onclick="location='/'">Lanjutkan Belanja</button>
    <button type="button" class="btn btn-success"  onclick="location='/checkout.php'">Checkout</button>
  </div>
</div>


<?php include "layout/foot.php"; ?>