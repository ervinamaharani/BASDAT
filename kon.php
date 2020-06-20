<?php

///membuat koneksi ke database
$server="localhost"; ///nama server
$user="root"; ///nama username mysql
$Password="";
$database="REGROW"; ///nama database yang dipilih

$con=mysqli_connect($server, $user, $Password, $database);
if (!$con){
	  die("Koneksi gagal:".mysqli_connect_error());
}
?>