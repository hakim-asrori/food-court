<?php
$i = 1;
$ambil = $koneksi->query("SELECT * FROM tb_komplain");
?>

<h1 class="h3 mb-3 text-gray-800 text-uppercase">Data Pembelian</h1>

<button class="btn btn-danger">Hapus Pesan</button>
<button class="btn btn-primary">Tandai Sudah Dibaca</button>

<div class="table-responsive mt-3">
	<table class="table table-hover
	table-striped table-bordered">
	<thead>
		<tr>
			<th><input type="checkbox" onchange="checkAll(this)"></th>
			<th>Nama Pembelian</th>
			<th>Tanggal Komplain</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th><input type="checkbox" id="hapus"></th>
			<td>Hakim</td>
			<td>24 Oktober 2001</td>
			<td>
				<span class="badge badge-danger">Belum Dibaca</span>
				<span class="badge badge-success">Sudah Dibaca</span>
			</td>
			<td>
				<a href="" class="badge badge-info">Lihat Pesan</a>
			</td>
		</tr>
		<tr>
			<th><input type="checkbox" id="hapus"></th>
			<td>Hakim</td>
			<td>24 Oktober 2001</td>
			<td>
				<span class="badge badge-danger">Belum Dibaca</span>
				<span class="badge badge-success">Sudah Dibaca</span>
			</td>
			<td>
				<a href="" class="badge badge-info">Lihat Pesan</a>
			</td>
		</tr>
	</tbody>
</table>
</div>

<script type="text/javascript">
	function checkAll(ele) {
		var checkboxes = document.getElementsByTagName('input');
		if (ele.checked) {
			for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i].type == 'checkbox' ) {
					checkboxes[i].checked = true;
				}
			}
		} else {
			for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i].type == 'checkbox') {
					checkboxes[i].checked = false;
				}
			}
		}
	}
</script>