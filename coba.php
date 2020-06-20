<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regrow_RPL</title>
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
    <div class="container">
       <header>
            <img src="images/logo.svg" alt="regrow logo" class="logo"> 
       </header>
    </div>

    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "kon.php";
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Username=$_POST['Username'];
		$Email=$_POST['Email'];
		$Password=$_POST['Password'];
		$Nomor_Telepon=$_POST['Nomor_Telepon'];
		$Alamat=$_POST['Alamat'];


	///input ke tabel pengguna
	$input="INSERT INTO mahasiswa (Username, Email, Password, Nomor_Telepon, Alamat) VALUES ('$Username', '$Email', '$Password', '$Nomor_Telepon', '$Alamat')";

	//Mengeksekusi/menjalankan query diatas
	$hasil=mysqli_query($kon,$input);

	//Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.html");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }
	?>      

   

 <div class="container2">
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
            <div>
                <input type="text" name="Username" class="form-control" required/>
                <label>Username</label>
            </div>
            <div>
                <input type="email" name="Email" class="form-control" required>
                <label>Email</label>
            </div>
            <div>
                <input type="password" name="Password" class="form-control" required>
                <label>Password</label>
            </div>
            <div>
                <input type="tel" name="Nomor_Telepon" class="form-control" required>
                <label>Phone number</label>
            </div>
            <div>
                <input type="text" name="Alamat" class="form-control" required>
                <label>Address</label>
            </div>
            <!-- beberapa name input ada yang diubah menyesuaikan db -->

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis omnis mollitia quo, repellat corrupti laudantium!</p>
            
            <button type="submit"><a href="index.html">Daftar</a></button>
        </form>
    </div>

<div class="container3">
        <p>Sudah punya akun?<a href="login.html">masuk</a></p>
    </div>

    <script>
        function openNav() {
          document.getElementById("nav").style.width = "200px";
        }
        
        function closeNav() {
          document.getElementById("nav").style.width = "0";
        }
    </script>
</body>
<!--</html>