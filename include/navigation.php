<?php

function setActive($filename){
	$file = "/".$filename;
	if($_SERVER['SCRIPT_NAME'] == $file){
		echo "class='active'";
	}
}

?>

<header class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<a href="index.php" class="navbar-brand">E-Konter</a>

			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="menu">
			<ul class="nav navbar-nav navbar-right">
				<li	<?php setActive('index.php');?>>
					<a href="index.php">
						<span class="glyphicon glyphicon-edit">&nbsp;</span>
						Buat Transaksi
					</a>
				</li>
				<li <?php setActive('sesuaikan-harga.php'); ?>>
					<a href="sesuaikan-harga.php">
						<span class="glyphicon glyphicon-barcode">&nbsp;</span>
						Sesuaikan Harga
					</a>
				</li>
				<li <?php setActive('cek-transaksi.php'); ?>>
					<a href="cek-transaksi.php">
						<span class="glyphicon glyphicon-list-alt">&nbsp;</span>
						Cek Transaksi
					</a>
				</li>
				<li <?php setActive('pendapatan.php'); ?>>
					<a href="pendapatan.php">
						<span class="glyphicon glyphicon-usd">&nbsp;</span>
						Pendapatan
					</a>
				</li>
				<li class="hire">
					<a href="#">
						<span class="	glyphicon glyphicon-briefcase"></span>
						Hire Me
					</a>
				</li>
			</ul>
		</div>
	</div>
</header>
<br>




<!-- <br>
<ul class="nav nav-pills">
	<li><a href="index.php">Buat Transaksi</a></li>
	<li><a href="sesuaikan-harga.php">Sesuaikan Harga</a></li>
	<li><a href="cek-transaksi.php">Cek Transaksi</a></li>
	<li><a href="pendapatan.php">Pendapatan</a></li>
</ul> -->
