<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sesuaikan Harga</title>
	<?php include "include/head.php"; ?>
</head>
<body>
		<?php include "include/navigation.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<?php if(!isset($_GET['edit'])){ ?>
				<h3>Tambah Nominal</h3>
				<form action="proses/tambahNominal.php" method="POST">
					<label>Kode Nominal</label>
					<div class="form-group">
						<input type="text" class="form-control" name="kode_nominal" placeholder="Example : S5, S10, T1, T5, XL10">
					</div>
					<label>Harga Beli</label>
					<div class="form-group input-group">
							<span class="input-group-addon">Rp.</span>
							<input type="number" class="form-control" name="harga_beli" placeholder="11.400">
					</div>
					<label>Harga Jual</label>
					<div class="form-group input-group">
						<span class="input-group-addon">Rp.</span>
						<input type="number" class="form-control" name="harga_jual" placeholder="12.000">
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<input type="text" class="form-control" name="keterangan">
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-block" name="tambah">
							Tambah Nominal +
						</button>
					</div>
				</form>
				<?php } else {
					$id = $_GET['edit'];
					$query = mysqli_query($con, "SELECT * FROM nominal WHERE kode_nominal='$id'");
					$data = mysqli_fetch_array($query);

				?>
				<h3>Edit Nominal</h3>
				<form action="proses/editNominal.php?edit=<?php echo $id; ?>" method="POST">
					<div class="form-group">
						<label>Kode Nominal</label>
						<input type="text" class="form-control" name="kode_nominal" value="<?php echo $data['kode_nominal']; ?>" disabled>
					</div>
					<div class="form-group">
						<label>Harga Beli</label>
						<input type="number" class="form-control" name="harga_beli" value="<?php echo $data['harga_beli']; ?>">
					</div>
					<div class="form-group">
						<label>Harga Jual</label>
						<input type="number" class="form-control" name="harga_jual" value="<?php echo $data['harga_jual']; ?>">
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<input type="text" class="form-control" name="keterangan" value="<?php echo $data['keterangan']; ?>">
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-block" name="edit">
							Edit Nominal *
						</button>
					</div>
				</form>
				<?php } ?>
			</div>
		<div class="col-lg-8 text-center">
			<h3>SESUAIKAN HARGA</h3>
			<p>
			Sesuaikan harga transaksi dengan menambah/mensunting daftar nominal dibawah ini dengan mengisi formulir disamping. Data yang sudah dimasukan dapat diubah namun kode nominal tidak dapat diubah. Sehingga jika anda salah memasukan kode nominal, hapus nominal tersebut dan buat kode nominal baru.
			</p>
			<br>
			<p>
				<span class="glyphicon glyphicon-tags" style="font-size:50px"></span>
			</p>
		</div>
	</div>
		<hr>
		<div class="row">

		<?php
		$query = mysqli_query($con, "SELECT * FROM nominal");
		$i = 1;
		?>

			<div class="col-lg-12">
				<h2>Table Nominal</h2><br>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<td>#</td>
							<td>Kode Nominal</td>
							<td>Harga Beli</td>
							<td>Harga Jual</td>
							<td>Keuntungan</td>
							<td>Keterangan</td>
							<td class="text-center">Action</td>
						</tr>
					</thead>
					<tbody>
						<?php while($data = mysqli_fetch_array($query)){ ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $data['kode_nominal']; ?></td>
							<td><?php echo $data['harga_beli'] ?></td>
							<td><?php echo $data['harga_jual']; ?></td>
							<td>
									<?php echo $data['harga_jual']-$data['harga_beli']; ?>
							</td>
							<td><?php echo $data['keterangan']; ?></td>
							<td class="text-center">
								[<a href="?edit=<?php echo $data['kode_nominal']; ?>" class="info">Edit</a>]
								-
								[<a href="proses/hapusNominal.php?hapus=<?php echo $data['kode_nominal']; ?>" class="danger">Hapus</a>]
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
