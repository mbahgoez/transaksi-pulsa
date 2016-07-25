<?php
include "../koneksi.php";

if(isset($_POST['tambah'])){

  $kode = $_POST['kode_nominal'];
  $harga_beli = $_POST['harga_beli'];
  $harga_jual = $_POST['harga_jual'];
  $keterangan = $_POST['keterangan'];

  $query = mysqli_query($con, "INSERT INTO nominal VALUES('$kode','$harga_jual','$harga_beli','$keterangan')");

  if($query){
      header("Location:../sesuaikan-harga.php?status=berhasil");
  }

} else {
  header("Location:../sesuaikan-harga.php?status=gagal");
}
