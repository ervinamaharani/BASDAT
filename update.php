<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regrow_RPL</title>
    <link rel="stylesheet" href="css/sell.css">
</head>
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
   </div>
</body>

<div class="container2">
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama Kode_Produk
    if (isset($_GET['Kode_Produk'])) {
        $id=input($_GET["Kode_Produk"]);

        $sql="select * from produk where Kode_Produk=$id";
        $hasil=mysqli_query($con,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id=htmlspecialchars($_POST["Kode_Produk"]);
        $nama=input($_POST["name"]);
        $deskripsi=input($_POST["Description"]);
        $harga=input($_POST["price"]);
        $foto = $_FILES['foto_produk']['name'];

        $target = 'namafolder/' . $foto;

        if(move_uploaded_file($_FILES['foto_produk']['tmp_name'], $target)){
        //Query update data pada tabel anggota
        $sql="update produk set
			Nama_Produk='$nama',
			Deskripsi_Produk='$deskripsi',
			Harga_Produk='$harga',
			Foto_Produk='$foto'
			where Kode_Produk=$id";

        //Mengeksekusi atau menjalankan query diatas
        $hasil =mysqli_query($con,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:daftarproduk.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

        }
    }
    ?>


   <h1><span>S</span>ell</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
      <div id="dropzone">
        <h1>Drag n Drop Photo</h1>
        <input type="file" id="foto_produk" name="foto_produk" value = "<?php if(isset($data['Foto_Produk'])) echo $data['Foto_Produk'];?>">
    </div>
    <h1 id="error"></h1><br></br>
    <h1 id="progress"></h1><br></br>
    <div id="files"></div>
        <div>
            <label>What's your product name?</label>
            <input type="text" name="name"  value= "<?php if(isset($data['Nama_Produk'])) echo $data['Nama_Produk'];?>" required/> 
        </div>
        <div>
            <label>Description of your product</label>
            <textarea name="Description"  > <?php if(isset($data['Deskripsi_Produk'])) echo $data['Deskripsi_Produk'];?> </textarea>
        </div>
        <div>
            <label>What's the price for your product</label>
            <input type="text" name="price" value="<?php if(isset($data['Harga_Produk'])) echo $data['Harga_Produk'];?>" required/>
        </div>

        <input type="hidden" name="Kode_Produk" value="<?php if(isset($data['Kode_Produk'])) echo $data['Kode_Produk'];?>" />

        <div>
            <button type="submit" name="foto_produk">Submit</button>
        </div>
    </form>  
   </div> 

   <script>
    function openNav() {
      document.getElementById("nav").style.width = "50%";
    }
    
    function closeNav() {
      document.getElementById("nav").style.width = "0";
    }
   </script>

   <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
   <script src="js copy/vendor/jquery.ui.widget.js" type="text/javascript"></script>
   <script src="js copy/jquery.iframe-transport.js" type="text/javascript"></script>
   <script src="js copy/jquery.fileupload.js" type="text/javascript"></script>
   <script type="text/javascript">
       $(function () {
           var files = $("#files");

           $("#fileupload").fileupload({
               url: "update.php",
               dropzone: "#dropzone",
               datatype: "json",
               autoupload: false
           }).on("fileuploadadd", function (e, data) {
                var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
                var fileName = data.originalFiles[0]["name"];
                var fileSize = data.originalFiles[0]["size"];
            
                if (!fileTypeAllowed.test(fileName))
                    $("#error").html("Only images are allowed");
                else if (fileSize > 500000)
                    $("#error").html("Your file size is to big, max allowed size is 500kb");
                else {
                    $("#error").html("");
                    data.submit();
                    console.log(data);
                }
           }).on("fileuploaddone", function(e, data) {
               
           }).on("fileuploadprogressal", function(e, data) {
      
           });
       });
   </script>
</body>
</html>