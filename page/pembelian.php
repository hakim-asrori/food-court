<?php include "../function/bootstrap.php"; ?>
<?php include "../layout/head.php"; ?>
<?php include "../layout/nav.php"; ?>
<div class="container">
    <h3>Checkout</h3>
    <div class="card">
        <div class="card-body">


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama makanan</th>
                        <th scope="col">harga</th>
                        <th scope="col">jumlah</th>
                        <th scope="col">total harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Seblak</td>
                        <td>10.000</td>
                        <td>2</td>
                        <td>20.000</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>N.DJ</td>
                        <td>25.000</td>
                        <td>2</td>
                        <td>50.000</td>
                    </tr>
                    <tr>
                        <td colspan="4">total belanja</td>
                        <td>70.000</td>
                    </tr>
                </tbody>
            </table>
            <form>
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama konsumen</label>
                            <input type="text" class="form-control" id="nama_konsumen" aria-describedby="emailHelp">
                        </div>
                        
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nomor telepon</label>
                            <input type="text" class="form-control" id="nomor_telepon">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">metode pembayaran</label>
                            <input type="text" class="form-control" id="metode_pembayaran">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Alamat</label>
                    <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">checkout</button>
            </form>
        </div>
    </div>
</div>
</div>


<?php include "../layout/foot.php"; ?>
