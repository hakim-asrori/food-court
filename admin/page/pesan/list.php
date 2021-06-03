<?php
$i = 1;
$ambil = $koneksi->query("SELECT * FROM tb_komplain");
?>

<h1 class="h3 mb-3 text-gray-800 text-uppercase">Data Saran dan Kritik</h1>

<div class="table-responsive mt-3">
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>Nama Pembeli</th>
				<th>Tanggal Komplain</th>
				<th>Tanggal Beli</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>

<script>
	load();

	function load() {
		let xhttp = new XMLHttpRequest();
		xhttp.open("GET", "./page/pesan/load.php", true);

		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				let response = JSON.parse(this.responseText);

				let empTable = document.querySelector("table").getElementsByTagName("tbody")[0];

				empTable.innerHTML = "";

				for (let key in response) {
					if (response.hasOwnProperty(key)) {
						let val = response[key];

						let NewRow = empTable.insertRow(0); 
						
						let nama = NewRow.insertCell(0); 
						let tgl_komplain = NewRow.insertCell(1); 
						let tgl_beli = NewRow.insertCell(2); 
						let status = NewRow.insertCell(3); 
						let aksi_cell = NewRow.insertCell(4);

						nama.innerHTML = val['pelanggan']; 
						tgl_komplain.innerHTML = val['tgl_komplain']; 
						tgl_beli.innerHTML = val['tgl_beli']; 
						
						if (val['status'] == 1) {
							status.innerHTML = '<span class="badge badge-warning">Belum dibaca</span>'; 
						} else {
							status.innerHTML = '<span class="badge badge-success">Sudah dibaca</span>'; 
						}

						aksi_cell.innerHTML = '<button onclick="edit('+ val['id'] +')" class="badge badge-primary">Lihat Pesan</button> <!-- | <button onclick="hapus('+ val['id'] +')" class="badge badge-danger">Hapus</button> -->'; 

					}
				}


			}
		};

		xhttp.send();

	}

	function edit(id) {

		location = "./pesan.php?page=detail&id="+id;

	}

	function hapus(id) {
		let xhttp = new XMLHttpRequest();

		xhttp.open("GET", "./page/pesan/hapus.php?id="+id, true);

		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				let response = this.responseText;
				console.log(response);
				if(response == 1){
					alert("Data berhasil dihapus.");

					load();
				} else {
					alert("Hapus gagal.");
				}

			}
		};

		xhttp.send();
	}

	document.addEventListener('DOMContentLoaded', function() {
		reload();
	});

	function reload() {
		setTimeout(function() {
			load();
			// reload();
		}, 200);
	}

</script>