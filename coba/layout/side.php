<div class="wrapper">

	<ul class="_sidebar" id="_sidebar">
		<li class="<?= ($uri == '') ? 'active' : '' ?>">
			<a href="./" title="Home">
				<i class="fas fa-fw fa-home"></i>
				<span>Home</span>
			</a>
		</li>
		<li class="<?= ($uri == 'keranjang.php') ? 'active' : '' ?>">
			<a href="keranjang.php" title="Keranjang">
				<i class="fas fa-fw fa-shopping-basket"></i>
				<span>Keranjang</span>
			</a>
		</li>
		<li class="<?= ($uri == 'checkout.php') ? 'active' : '' ?>">
			<a href="checkout.php" title="Checkout">
				<i class="fas fa-fw fa-money-check-alt"></i>
				<span>Checkout</span>
			</a>
		</li>
		<li class="<?= ($uri == 'riwayat.php') ? 'active' : '' ?>">
			<a href="riwayat.php" title="Riwayat Belanja">
				<i class="fas fa-fw fa-file-alt"></i>
				<span>Riwayat Belanja</span>
			</a>
		</li>
	</ul>

	<div class="content" id="content">
		<div class="container">