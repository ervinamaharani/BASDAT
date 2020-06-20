<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regrow_RPL</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<style>
        h2{
            color: white;
        }
        th{ 
            color: white;
        }
        td{
            color: white;
        }
    </style>

<body>
   <div class="container">
       <header>
            <img src="images/logo.svg" alt="regrow logo" class="logo">

            <nav>
            <span style="cursor:pointer" class="ham" onclick="openNav()"><img src="images/ham.svg" alt="bar"></span>

                <ul class="sidenav" id="nav">
                    <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="images/exit.svg" alt="exit"></a></li>
                    <li><a href="#">home</a></li>
                    <li><a href="shop.html">shop</a></li>
                    <li><a href="register.html">register</a></li>
                    <li><a href="login.html">login</a></li>
                </ul>
            </nav>
       </header>

<body>
<div class="container">
    <br>
    <h2>Data Produk</h2>
<?php

    include "kon.php";

    //Cek apakah ada nilai dari method GET dengan nama id_anggota
    if (isset($_GET['Kode_Produk'])) {
        $id=htmlspecialchars($_GET["Kode_Produk"]);

        $sql="delete from produk where Kode_Produk='$id' ";
        $hasil=mysqli_query($con,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:daftarproduk.php");

            }
            else {
                echo "<div class='alert alert-danger'> Produk Gagal dihapus.</div>";

            }
        }
?>


    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Foto Produk</th>
            <th>Deskripsi</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "kon.php";
        $sql="select * from produk order by Kode_Produk desc";

        $hasil=mysqli_query($con,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $data["Kode_Produk"]; ?></td>
                <td><?php echo $data["Nama_Produk"];   ?></td>
                <td><?php echo $data["Harga_Produk"];   ?></td>
                <td><?php echo $data["Foto_Produk"];   ?></td>
                <td><?php echo $data["Deskripsi_Produk"];   ?></td>
                <td>
                    <a href="update.php?Kode_Produk=<?php echo htmlspecialchars($data['Kode_Produk']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?Kode_Produk=<?php echo $data['Kode_Produk']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>

    <a href="sell.php" class="btn btn-primary" role="button">Tambah Data</a>

    <script>
        function openNav() {
          document.getElementById("nav").style.width = "50%";
        }
        
        function closeNav() {
          document.getElementById("nav").style.width = "0";
        }
    </script>

</div>
</body>
</html>