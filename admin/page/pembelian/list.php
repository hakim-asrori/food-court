<?php
$i = 1;
$ambil = $koneksi->query("SELECT * FROM tb_checkout");
?>

<h1 class="h3 mb-3 text-gray-800 text-uppercase">Data Pembelian</h1>

<div class="table-responsive">
	<table class="table table-hover
	table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pembelian</th>
			<th>Tanggal</th>
			<th>Status Pembelian</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while ($p = $ambil->fetch_assoc()):
			$status = $koneksi->query("SELECT status FROM tb_status_produk WHERE id_status = '$p[status]'")->fetch_assoc();
			?>
			<tr>
				<th><?= $i++ ?></th>
				<td><?= $p['nama_pemesan'] ?></td>
				<td><?= date("d", strtotime($p['tgl_beli']))." ".bulan(date("m", strtotime($p['tgl_beli'])))." ".date("Y", strtotime($p['tgl_beli'])); ?></td>
				<td><span class="text-uppercase"><?= $status['status'] ?></span></td>
				<td>
					<button onclick="location='./pembelian.php?page=detail&search=<?= $p['id_checkout'] ?>'" class="btn btn-info">Detail</button>
					<?php if ($p['status'] != 2): ?>
						<button class="btn btn-success" onclick="antar(<?= $p['id_checkout'] ?>)">Diantar?</button>
					<?php endif ?>
				</td>
			</tr>
		<?php endwhile ?>
	</tbody>
</table>
</div>

<script>
	function antar(id_checkout) {

		if(id_checkout != ''){

			let data = {id_checkout: id_checkout};
			let xhr = new XMLHttpRequest();
			xhr.open("POST", "pembelian.php?page=antar", true);

			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					let response = this.responseText;
					console.log(response);
					if(response == 1){
						alert("Masuk data list antar.");
						location = 'pembelian.php';
					} else {
						alert("Gagal diantar.");
					}
				}
			};

			xhr.setRequestHeader("Content-Type", "application/json");

			xhr.send(JSON.stringify(data));
		}
	}
</script>