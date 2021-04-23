<?php include "../function/bootstrap.php"; ?>
<?php include "../layout/head.php"; ?>
<?php include "../layout/nav.php"; ?>

<h1>Isi Keranjang</h1>
<div class="card">
  <div class="card-body">
    <table class="table table-bordered">
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
        <tr>
          <th scope="row">1</th>
          <td>Seblak</td>
          <td>10.000</td>
          <td>2</td>
          <td>20.000</td>
          <td><button type="button" class="btn btn-danger">Hapus</button></td>
        </tr>
      </tbody>
    </table>
    <button type="button" class="btn btn-secondary">Lanjutkan Belanja</button>
    <button type="button" class="btn btn-success">Checkout</button>
  </div>
</div>


<?php include "../layout/foot.php"; ?>
