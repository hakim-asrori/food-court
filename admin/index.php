<?php
include "../function/bootstrap.php";
include "security.php";
include "layout/head.php";
include "layout/side.php";
include "layout/nav.php";

$produk = $koneksi->query("SELECT * FROM tb_produk")->num_rows;
$penghasilan = '';
$pelanggan = $koneksi->query("SELECT * FROM tb_users WHERE id_role = 1")->num_rows;
$komplain = $koneksi->query("SELECT * FROM tb_komplain")->num_rows;

?>
<div class="container-fluid">

	<h1 class="h3 mb-4 text-gray-800">HALLO SELAMAT DATANG DI FOOD COURT SELAMAT MENIKMATI</h1>
	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Produk</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $produk ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-cube fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penghasilan (1 Bulan)</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Pelanggan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pelanggan ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user-alt fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Komplain</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $komplain ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-comments fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque possimus suscipit quisquam est praesentium temporibus, recusandae eius illo veritatis necessitatibus, sapiente id eaque magnam qui corporis sed eum! Nobis obcaecati expedita repudiandae, quia, unde molestiae. Eum corporis esse quisquam, omnis delectus, illo rerum molestiae, perspiciatis cupiditate eos blanditiis! Pariatur vitae nobis ullam dolor alias inventore unde quisquam tempora. Atque sit rerum commodi a quas tenetur animi placeat perferendis optio perspiciatis laboriosam facere assumenda qui quasi impedit iste voluptatem hic natus modi voluptas, cum ipsum corporis doloribus? Sed ratione recusandae expedita omnis beatae. Sapiente veritatis reprehenderit nam optio eos consequatur eum labore eius quod natus tenetur repellendus, molestias magni eligendi possimus ea fugiat, inventore odit alias quis accusantium animi voluptate. Molestiae odio illo rerum quae, deleniti est ad quo enim saepe dolore, inventore nesciunt fuga. Ex tempore minima repudiandae nam quia ea maiores nobis mollitia porro nihil architecto quae, aperiam velit modi officiis amet molestiae labore repellat. Cupiditate beatae voluptate tempore velit atque, repudiandae repellat nesciunt quaerat quos nulla rem? Beatae vero commodi vitae consequuntur animi optio adipisci repellendus iure facere nihil, est perferendis dicta ipsa voluptates vel, fugit. Voluptate, eius, error! Optio cumque iure nisi quae sapiente modi, nulla, ratione! Sunt nesciunt accusantium magni labore magnam quod tempora aut esse? At quam ipsam pariatur reprehenderit mollitia, optio hic possimus explicabo fuga tempore perspiciatis rem quidem illo debitis totam assumenda omnis laboriosam voluptas vero dolore quia consequatur provident modi. Maxime reiciendis vel minima ea aut eius ipsum temporibus quae nulla nobis numquam harum quisquam culpa placeat fuga, libero sed veniam exercitationem, repellat, accusantium ratione quasi quo nesciunt esse. Laboriosam non sint, fugit? Aperiam, commodi, itaque quos, sed fugit odio totam alias, officia veniam eos repudiandae quidem in autem eveniet obcaecati! Nam, debitis. Officiis, commodi delectus suscipit explicabo odit vitae est, aliquam minima minus. Dolorem magnam numquam sequi impedit odio earum quisquam quos dolore, vitae ipsam at blanditiis quod eius minus eligendi assumenda. Impedit mollitia neque nemo officiis quasi cupiditate molestiae vel animi ratione labore reiciendis enim sed fugiat corporis, alias, cum modi at! Repudiandae, eaque eveniet optio provident consequatur minus, sit quidem, praesentium assumenda id illo quam. Rem facilis, omnis quasi ab voluptate velit temporibus suscipit doloribus, nobis aut commodi autem recusandae illo sunt harum nisi ea, nostrum, atque eligendi maiores delectus quo laboriosam magni quae. Minima doloribus quod saepe quisquam dolorem beatae, similique ea quam minus quaerat atque tempore maxime praesentium dignissimos laborum at ducimus rerum aut esse necessitatibus deserunt incidunt a? Ullam maxime laborum, consequatur esse aperiam accusamus officiis rem aliquam quae at accusantium modi enim quisquam tempore nemo sint dolorum repellat quos commodi iusto repellendus voluptas officia deleniti minima? Quia labore nam vitae assumenda, possimus. Quis voluptate quibusdam a itaque! Distinctio deleniti, ut earum placeat? Ab quisquam aut sapiente qui esse dolores, ad impedit quia autem minima nulla corporis, doloribus blanditiis officia molestiae eveniet. Dicta, accusantium, voluptas alias quis iste fugiat harum omnis voluptatum sint est consectetur cumque obcaecati, tenetur minus, in. Veritatis libero laborum temporibus mollitia ut?
	</div>

	<!-- Content Row -->

</div>

<?php include "layout/foot.php"; ?>