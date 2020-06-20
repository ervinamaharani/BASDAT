<?php
///membuat koneksi ke database
$server="localhost"; ///nama server
$user="root"; ///nama username mysql
$Password=NULL;
$database="REGROW"; ///nama database yang dipilih

$con=mysqli_connect($server, $user, $Password) or die ("Koneksi Gagal"); ///koneksi ke database
mysqli_select_db($con,$database) or die ("Database tidak tersedia"); ///memilih database, dan menampilkan pesan jika gagal

if(isset($_POST['foto_produk'])) {
	
///mengambil data dari form
$nama = $_POST['name'];
$deskripsi = $_POST['Description'];
$harga = $_POST['price'];
$foto = $_FILES['fotoproduk']['name'];

$target = 'namafolder/' . $foto;

if(move_uploaded_file($_FILES['fotoproduk']['tmp_name'], $target)){
	$sql = "INSERT INTO produk (Kode_Produk, Nama_Produk, Deskripsi_Produk, Foto_Produk, Harga_Produk) VALUES (' ', '$nama', '$deskripsi', '$foto', '$harga')";
	if (mysqli_query($con, $sql)) {
            header('location: daftarproduk.php?Produk_Berhasil_Ditambahkan');
         
        }
        else {
            print "Database Error: Gagal mengunggah produk...!";
        
        }
}
else{
print "Error while registration...!";
	}
}
?>