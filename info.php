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

    <style>
        h4{
            color: white;
        }
        th{ 
            color: white;
        }
        td{
            color: white;
        }
    </style>
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
                    <li><a href="index.html">home</a></li>
                    <li><a href="shop.html">shop</a></li>
                    
                </ul>
            </nav>
       </header>

<body>
<div class="container">
    <br>
    <h2>Hubungi Penjual</h2>
<?php

    include "kon.php";

?>

	
        <?php
        include "kon.php";
        $sql="select * from pengguna WHERE UserID='2'";

        $hasil=mysqli_query($con,$sql);
        while ($data = mysqli_fetch_array($hasil)) {

            ?>
        <div class="card mb-3" style="max-width: 500px;">
		  <div class="row no-gutters">
		    <div class="col-md-4">
		      <img src="namafolder/User.png" class="card-img">
		    </div>
		    <div class="col-md-8">
		      <div class="card-body">
		        <h5 class="card-title"><?=$data['Username'];?> </h5>
		        <p class="card-text"> <?=$data['Email'];?></p>
		        <p class="card-text"><?=$data['Nomor_Telepon'];?></p>
		        <p class="card-text"><small class="text-muted"><?=$data['Alamat'];?></small></p>
		      </div>
		    </div>
		  </div>
		</div>

            <?php
        }
        ?>

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