<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buat Transaksi</title>
	<?php include "include/head.php" ?>
</head>
<body>
	<?php
	include "include/navigation.php";
	 ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<h2>FORM TRANSAKSI</h2>
				<form action="proses/tambahTrx.php" method="post">
					<div class="form-group">
						<label>Nama Penerima</label>
						<input type="text" class="form-control" name="nama_penerima" placeholder="Example : Sukijan, Sudirman, Sukiman">
					</div>
					<div class="form-group">
						<label>No Penerima</label>
						<input type="text" class="form-control" name="no_penerima" placeholder="Example : 089xxxxxxxxx">
					</div>
					<div class="form-group">
						<label>Nominal</label>
						<select class="form-control" name="kode_nominal">
							<option value="">Pilih Nominal</option>
							<?php
							$query = mysqli_query($con, "SELECT * FROM nominal");
							while($data = mysqli_fetch_array($query)){ ?>
							<option value="<?php echo $data['kode_nominal']; ?>">
								<?php echo $data['keterangan']; ?>
							</option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Status Pembayaran</label>
						<br>
						&nbsp;&nbsp;&nbsp;
						<label>
							<input type="radio" name="status" value="lunas">
							<span>Lunas</span>
						</label>
						&nbsp;&nbsp;
						<label>
							<input type="radio" name="status" value="hutang">
							<span>Hutang</span>
						</label>
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-block" name="tambah">
							Buat Transaksi
						</button>
					</div>
				</form>
			</div><!-- col-lg-4 -->
			<div class="col-lg-7 text-center">
				<h3>BUAT TRANSAKSI</h3>
				<p>
					Buatlah sebuah transaksi pada kolom formulir disamping, dengan begitu segala sesuatu yang berhubungan dengan Nama, No. HP, Nominal, Status pembayaran dll Pelanggan tercatat dengan baik. Pastikan data yang dimasukan sudah benar sebelum menekan tombol "Buat Transaksi"
				</p>
				<br>
				<p>
					<span class="glyphicon glyphicon-pushpin" style="font-size:50px"></span>
				</p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-12">
				<h3>Daftar Transaksi!</h3>
				<p>
					Dibawah ini merupakan table berisi kumpulan data transaksi yang telah dibuat. Untuk Mengorganisir transaksi berikut bisa di <a href="cek-transaksi.php">Cek Transaksi</a>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<?php
				$sql = "SELECT * FROM transaksi ORDER BY id_trx DESC";
				$query = mysqli_query($con, $sql);
				?>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<td>#</td>
							<td>Nama Penerima</td>
							<td>No HP</td>
							<td>Harga</td>
							<td>status</td>
						</tr>
					</thead>
					<tbody>

					<?php while($data = mysqli_fetch_array($query)){ ?>
					<tr>
						<td>1</td>
						<td><?php echo $data['nama_penerima']; ?></td>
						<td><?php echo $data['no_penerima']; ?></td>
						<td><?php echo $data['harga_jual']; ?></td>
						<td><?php echo $data['status']; ?></td>
						<?php } ?>
					</tr>
					</tbody>
				</table>
			</div>
		</div><!-- row -->
	</div>
</body>
</html>
