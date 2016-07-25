<?php
include "../koneksi.php";

$id = $_GET['id'];
$sql = "UPDATE transaksi SET status='lunas' WHERE id_trx='$id'";
$query = mysqli_query($con, $sql);

if($query){
  header("Location:../cek-transaksi.php?status=success");
}
