<?php
$id = $_GET['id'];

$data = $koneksi->query("SELECT tb_komplain.*, tb_checkout.nama_pemesan FROM tb_komplain JOIN tb_checkout ON tb_komplain.id_checkout = tb_checkout.id_checkout WHERE id_komplain = $id")->fetch_assoc();

$sql = $koneksi->query("SELECT * FROM tb_komplain_produk JOIN tb_produk ON tb_komplain_produk.id_produk = tb_produk.id_produk WHERE id_komplain = '$data[id_komplain]'");

if ($data['status'] == 1) {
	$koneksi->query("UPDATE tb_komplain SET status = 2 WHERE id_komplain = '$data[id_komplain]'");
}

?>

<div class="card">
	<div class="card-body">
		<div class="row mb-3">
			<div class="col-sm-6">
				<table>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td class="pl-3"><?= $data['nama_pemesan'] ?></td>
					</tr>
					<tr>
						<td>Produk</td>
						<td>:</td>
						<td class="pl-3">
							<?php
							while ($produk = $sql->fetch_assoc()) {
								echo "$produk[nama] <br/>";
							}
							?>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-sm-6">
				<a href="/assets/images/struk/<?= $data['foto'] ?>" target="blank">
					<img width="150" src="/assets/images/struk/<?= $data['foto'] ?>">
				</a>
			</div>
		</div>

		<div class="form-group">
			<label>Pesan</label>
			<textarea class="form-control" cols="30" disabled><?= $data['pesan'] ?></textarea>
		</div>
	</div>
</div>