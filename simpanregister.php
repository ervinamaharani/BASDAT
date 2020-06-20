<?php

///membuat koneksi ke database
$server="localhost"; ///nama server
$user="root"; ///nama username mysql
$Password=NULL;
$database="REGROW"; ///nama database yang dipilih

$con=mysqli_connect($server, $user, $Password) or die ("Koneksi Gagal"); ///koneksi ke database
mysqli_select_db($con,$database) or die ("Database tidak tersedia"); ///memilih database, dan menampilkan pesan jika gagal
///mengambil data dari form
$Username=$_POST['Username'];
$Email=$_POST['Email'];
$Password=$_POST['Password'];
$Nomor_Telepon=$_POST['Nomor_Telepon'];
$Alamat=$_POST['Alamat'];


///input ke tabel pengguna
$input=mysqli_query($con, "INSERT INTO pengguna (Username, Email, Password, Nomor_Telepon, Alamat) VALUES ('$Username', '$Email', '$Password', '$Nomor_Telepon', '$Alamat')");
///cek sudah terinput atau belum
if($input) ///jika sukses
{
header('Location: login.html?status=sukses');
}
else ///jika gagal
{
header('Location: register.html?status=gagal');
}
?>