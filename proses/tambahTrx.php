<?php
include "../koneksi.php";
if(isset($_POST['tambah'])){
  $nama_penerima = $_POST['nama_penerima'];
  $no_penerima = $_POST['no_penerima'];
  $kode_nominal = $_POST['kode_nominal'];
  $status = $_POST['status'];

  $sql = "SELECT * FROM nominal WHERE kode_nominal='$kode_nominal'";
  $query= mysqli_query($con, $sql);
  $data = mysqli_fetch_array($query);
  $harga_jual = $data['harga_jual'];
  $harga_beli = $data['harga_beli'];
  $laba = $harga_jual-$harga_beli;

  $sql = "INSERT INTO transaksi(nama_penerima, no_penerima, kode_nominal, harga_beli, harga_jual, labatrx, status) VALUES('$nama_penerima', '$no_penerima', '$kode_nominal', $harga_beli, $harga_jual, $laba, '$status')";
  $query = mysqli_query($con, $sql);
  if($query){
    header("Location:../index.php");
  }
}
