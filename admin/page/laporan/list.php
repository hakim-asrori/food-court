<h1 class="h3 mb-3 text-gray-800">Laporan Pembelian</h1>

<div class="row">
	<div class="col-sm-5">
		<label>Tanggal Mulai</label>
		<input type="date" class="form-control date" id="tglm">
	</div>
	<div class="col-sm-5">
		<label>Tanggal Selesai</label>
		<input type="date" class="form-control date" id="tgls">
	</div>
	<div class="col-sm-2">
		<label>&nbsp;</label>
		<br>
		<button class="btn btn-primary" onclick="lihatLaporan()">Lihat Laporan</button>
	</div>
</div>

<form method="post" action="/excel/laporan.php"  id="download" hidden class="mt-3">
	<input type="hidden" name="tglm" id="tgl_mulai">
	<input type="hidden" name="tgls" id="tgl_selesai">
	<button class="btn btn-success btn-icon-split"><span class="icon text-white-50"><i class="fas fa-download"></i></span><span class="text">Download Laporan</span></button>
</form>

<div class="card mt-3">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover table-bordered" id="dataTable">
				<thead>
					<tr>
						<th>Pelanggan</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th>Total Belanja</th>
					</tr>
				</thead>
				<tbody></tbody>
				<tfoot>
					<tr>
						<th colspan="3">Total Harga Keseluruhan</th>
						<th id="totalSeluruh"></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>

<script>
	function lihatLaporan() {
		var tglm = document.getElementById('tglm').value;
		var tgls = document.getElementById('tgls').value;

		if(tglm != '' && tgls !=''){

			let data = {tglm: tglm, tgls: tgls};
			let xhr = new XMLHttpRequest();
			xhr.open("POST", "./page/laporan/load.php", true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					let response = JSON.parse(this.responseText);
					let empTable = document.getElementById("dataTable").getElementsByTagName("tbody")[0];

					empTable.innerHTML = "";

					for (let key in response) {
						if (response.hasOwnProperty(key)) {
							let val = response[key];

							let NewRow = empTable.insertRow(0); 
							let pelanggan_cell = NewRow.insertCell(0); 
							let tanggal_cell = NewRow.insertCell(1); 
							let status_cell = NewRow.insertCell(2);
							let totalBelanja_cell = NewRow.insertCell(3);

							pelanggan_cell.innerHTML = val['pelanggan']; 
							tanggal_cell.innerHTML = val['tanggal']; 
							status_cell.innerHTML = val['status']; 
							totalBelanja_cell.innerHTML = val['total_belanja']; 

							document.getElementById('totalSeluruh').innerHTML = val['total_seluruh'];

							document.getElementById('tgl_mulai').value = tglm;
							document.getElementById('tgl_selesai').value = tgls;

							document.getElementById("download").hidden = false;
						}
					}
				}
			};

			xhr.send(JSON.stringify(data));
		}
	}
</script>