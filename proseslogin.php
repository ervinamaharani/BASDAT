<?php

///membuat koneksi ke database
$server="localhost"; ///nama server
$user="root"; ///nama username mysql
$Password=NULL;
$database="REGROW"; ///nama database yang dipilih

$con=mysqli_connect($server, $user, $Password) or die ("Koneksi Gagal"); ///koneksi ke database
mysqli_select_db($con,$database) or die ("Database tidak tersedia"); ///memilih database, dan menampilkan pesan jika gagal
///mengambil data dari form

if(isset($_POST['sign_in'])){
	
$username =filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_STRING);
$password= filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);

$user= mysqli_query($con, "SELECT * from pengguna WHERE (Username='$username' OR Email='$username') AND Password='$password'");
$check =mysqli_num_rows($user);

if($check>0){
	session_start();
	$row=mysqli_fetch_array($user);
	$_SESSION['Username']=$row['Username'];
	header('location: index.html?Login_Berhasil');
}
else {
	echo "<div class='alert alert-danger'> Login Gagal.</div>";
}

}
?>