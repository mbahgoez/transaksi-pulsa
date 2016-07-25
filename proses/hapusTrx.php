<?php
include "../koneksi.php";

$id = $_GET['hapus'];

$sql = "DELETE FROM transaksi WHERE id_trx='$id'";
$query = mysqli_query($con, $sql);
if($query){
  ?>
  <script type="text/javascript">
    alert("Berhasil");
    location.href = "../cek-transaksi.php";
  </script>
  <?php
}
