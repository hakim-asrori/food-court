<?php 
$uri = uri_segment(2);
?>
<body>

	<nav class="navbar bg-white">
		<div class="navbar-name">
			<button id="btn-toggle" class="navbar-toggle"><i class="fas fa-fw fa-bars" style="font-size: 1.4em"></i></button>
			<a href="./">Andon Mangan</a>
		</div>
		<form action="cari.php" class="navbar-search">
			<input type="search" placeholder="Search..." class="bg-light form-control" id="search" name="search">
			<button class="btn btn-primary"><i class="fas fa-search"></i></button>
		</form>

		<div class="navbar-menu">
			<ul>
				<?php if (isset($_SESSION['user'])): ?>
					<li><a href="./profil.php" class="btn btn-outline-primary mr-2"><i class="fas fa-fw fa-user-edit"></i></a></li>
					<li><a href="logout.php" class="btn btn-danger mr-2">Logout</a></li>
					<?php else: ?>
						<li><a href="login.php" class="btn btn-primary mr-2">Login</a></li>
						<li><a href="registrasi.php" class="btn btn-success mr-2">Daftar</a></li>
					<?php endif ?>
				</ul>
			</div>

			<div class="navbar-search-2">
				<button class="" id="search-toggle">
					<i class="fas fa-search fa-fw"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in">

					<form action="cari.php">
						<div class="input-group">
							<input type="search" class="form-control bg-light border-0 small" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2" id="search2" name="search">
							<div class="input-group-append">
								<button class="btn btn-primary">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>

				</div>
			</div>

		</nav>