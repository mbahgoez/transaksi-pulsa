<?php
include "koneksi.php";

$query = mysqli_query($con, "SELECT harga_jual,harga_beli FROM transaksi WHERE status='lunas'");
$lunas = 0;
$bayarlunas = 0;
while($data = mysqli_fetch_array($query)){
  $lunas += $data['harga_jual']-$data['harga_beli'];
  $bayarlunas += $data['harga_jual'];
}

$query = mysqli_query($con, "SELECT harga_jual,harga_beli FROM transaksi WHERE status='hutang'");
$hutang = 0;
$bayarhutang = 0;
while($data = mysqli_fetch_array($query)){
  $hutang += $data['harga_jual']-$data['harga_beli'];
  $bayarhutang += $data['harga_jual'];
}

$query = mysqli_query($con, "SELECT harga_jual,harga_beli FROM transaksi");
$total = 0;
while($data = mysqli_fetch_array($query)){
  $total += $data['harga_jual']-$data['harga_beli'];
}
?>
<html>
<head>
  <title>Pendapatan</title>
  <?php include "include/head.php"; ?>
</head>
<body>
  <?php include "include/navigation.php"; ?>
  <div class="container">
    <div class="row">
      <h3 class="text-center">Pendapatan Penjualan Pulsa</h3><br>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <table class="table table-bordered">
          <tr>
            <td>Total Pendapatan Lunas - Bersih</td>
          </tr>
          <tr>
            <td><?php echo $lunas; ?></td>
          </tr>
        </table>
      </div>

      <div class="col-lg-4">
        <table class="table table-bordered">
            <tr>
              <td>Total Pendapatan Hutang - Bersih</td>
            </tr>
            <tr>
              <td><?php echo $hutang; ?></td>
            </tr>
        </table>
      </div>

      <div class="col-lg-4">
        <table class="table table-bordered">
            <tr>
              <td>Total Pendapatan Keseluruhan - Bersih</td>
            </tr>
            <tr>
              <td><?php echo $total; ?></td>
            </tr>
        </table>
      </div>
      </div>
    </div>
  </div>
</body>
</html>
