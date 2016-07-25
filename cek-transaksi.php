<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cek Transaksi</title>
	<?php include "include/head.php"; ?>
</head>
<body>
	<?php include "include/navigation.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">

				<select id="filter" class="form-control" onchange="filterIt(this)">
					<option value="all">Semua Transaksi</option>
					<option value="hutang">Transaksi Belum Dibayar</option>
					<option value="lunas">Transaksi Lunas</option>
				</select>

<?php if(isset($_GET['filter'])){ ?>
				<script type="text/javascript">
		<?php	if($_GET['filter'] == "all"){ ?>
						document.getElementById("filter").selectedIndex = "0";
		<?php } else if($_GET['filter'] == "hutang"){ ?>
						document.getElementById("filter").selectedIndex = "1";
		<?php } else if($_GET['filter'] == "lunas"){ ?>
						document.getElementById("filter").selectedIndex = "2";
		<?php } ?>
				</script>
<?php } ?>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>Table Transaksi</h2>
				<p>Table data transaksi yang sudah pernah terjadi. Data ditampilkan disertai dengan keuntungan transaksi, tanggal transaksi, dan juga status pembayarannya. Anda dapat menghapus salah satu data transaksi jika memang transaksi tersebut dibatalkan.</p>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-12">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<td class="text-center">#</td>
							<td>Nama Penerima</td>
							<td>No HP</td>
							<td>Kode Nominal</td>
							<td>Harga Beli</td>
							<td>Harga Jual</td>
							<td>Keuntungan</td>
							<td>Tanggal</td>
							<td>Status</td>
							<td>action</td>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						if(!isset($_GET['filter'])){
							$sql = "SELECT * FROM transaksi ORDER BY id_trx DESC";
						} else if(isset($_GET['filter'])) {
							if($_GET['filter'] == 'all'){
								$sql = "SELECT * FROM transaksi ORDER BY id_trx DESC";
							} else if($_GET['filter'] == "lunas"){
								$sql = "SELECT * FROM transaksi WHERE status='lunas' ORDER BY id_trx DESC";
							} else if($_GET['filter'] == "hutang"){
								$sql = "SELECT * FROM transaksi WHERE status='hutang' ORDER BY id_trx DESC ";
							}
						}

						$query = mysqli_query($con, $sql);
						if(mysqli_num_rows($query) > 0){

						while($data = mysqli_fetch_array($query)){
						?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo $data['nama_penerima']; ?></td>
							<td><?php echo $data['no_penerima']; ?></td>
							<td><?php echo $data['kode_nominal']; ?></td>
							<td><?php echo $data['harga_beli']; ?></td>
							<td><?php echo $data['harga_jual']; ?></td>
							<td><?php echo $data['labatrx']; ?></td>
							<td>
								<?php
								$tgl = date_create($data['tanggal']);
								$d = date_format($tgl, "w");

								if($d == 0){
									$hari = "Minggu";
								} else if($d == 1) {
									$hari = "Senin";
								} else if($d == 2) {
									$hari = "Selasa";
								} else if($d == 3) {
									$hari = "Rabu";
								} else if($d == 4) {
									$hari = "Kamis";
								} else if($d == 5) {
									$hari = "Jumat";
								} else if($d == 6) {
									$hari = "Sabtu";
								}
								echo $hari.". ".date_format($tgl, "h:i a, F d, Y");;

							?>
							</td>
							<td><?php echo $data['status']; ?></td>
							<td>
								<?php
								if($data['status'] == "hutang"){
								?>
								[<a href="proses/confirmLunas.php?id=<?php echo $data['id_trx']; ?>">Tandai Lunas</a>] |
								<?php } ?>

								[<a href="proses/hapusTrx.php?hapus=<?php echo $data['id_trx']; ?>">Hapus</a>]
							</td>
						</tr>
						<?php }
						} else {
						?>
						<tr>
							<td colspan="10" class="text-center">
								<h3>Tidak ada transaksi apapun!</h3>
							</td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		var filterIt = function(elem){
			valfilter = elem.value;
			location.href = "cek-transaksi.php?filter="+valfilter;
		}
		var tandaiLunas = function(id){
			var c = confirm("Yakin ingin hapus");

			if(c == true){
				location.href = "proses/tandaiLunas.php?id="+id;
			} else {
				alert("dibatalkan!");
			}
		}
	</script>
</body>
</html>
