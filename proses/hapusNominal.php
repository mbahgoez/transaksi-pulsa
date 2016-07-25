<?php
error_reporting(E_ALL);
include "../koneksi.php";

if(isset($_GET['hapus'])){
  $id = $_GET['hapus'];
  $query = mysqli_query($con, "DELETE FROM nominal WHERE kode_nominal='$id'");

  if($query){
    header("Location:../sesuaikan-harga.php?status=success");
  } else {
    echo mysqli_error($con);
    // header("Location:../sesuaikan-harga.php?status=gagal");
  }
}
