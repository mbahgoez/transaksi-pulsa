<?php
include "../koneksi.php";
if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $harga_beli = $_POST['harga_beli'];
  $harga_jual = $_POST['harga_jual'];
  $keterangan = $_POST['keterangan'];


  $sql = "UPDATE nominal SET harga_beli='$harga_beli', harga_jual='$harga_jual', keterangan='$keterangan' WHERE kode_nominal='$id'";
  $query = mysqli_query($con, $sql);

  if($query){
    header("Location:../sesuaikan-harga.php?status=success");
  }

}
