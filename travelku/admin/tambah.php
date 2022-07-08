<?php 

session_start();

if (!isset($_SESSION['admin'])) {
   echo "<script>
         window.location.replace('../login.php');
       </script>";
  exit;
}
require 'functions.php';


if (isset($_POST["register"])) {
  
  if (tambah($_POST) > 0 ) {
     echo "<script>
        alert('Maskapai Berhasil Ditambahkan!');
        window.location.href='index.php';
      </script>";
  } else {
    echo mysqli_error($conn);
  }

} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/348c676099.js" crossorigin="anonymous"></script>
    <title>Travelku</title>
    <style>
        .btn {
            text-decoration: none;
            padding: 3px 10px;
            background-color: darkred;
        }
        #content {
            width: 100%;
        }
        body {
          background-image: url("../images/bg.jpeg");
          background-size: contain;
        }
    </style>
</head>

<body>
    <header>
        <div class="jumbotron">
            <h3>Travelku <i class="fab fa-accusoft"></i></h3>
        </div>
    </header>

   <main>
        <div id="content">
            <h2 class="judul">Tambah Maskapai</h2>
            <article class="card">
                <form action="" method="post">
                     <div class="jarak">
                         <label for="kode">Kode Maskapai</label>
                         <input type="text" id="kode" name="kode" placeholder="Masukkan Kode Maskapai" required>
                    </div>
                    <div class="jarak">
                         <label for="nama_maskapai">Nama Maskapai</label>
                         <input type="text" id="nama_maskapai" name="nama_maskapai" placeholder="Masukkan Nama Maskapai" required>
                    </div>
                    <div class="jarak">
                         <label for="harga">Harga</label>
                         <input type="number" id="harga" name="harga" placeholder="Masukkan Harga" required>
                     </div>
                    </div><div class="jarak">
                         <label for="kepemilikan">Kepemilikan</label>
                         <input type="text" id="kepemilikan" name="kepemilikan" placeholder="Masukkan Kepemilikan" required>
                    </div>
                    <div class="jarak">
                         <label for="jenis_pesawat">Jenis Pesawat</label>
                         <input type="text" id="jenis_pesawat" name="jenis_pesawat" placeholder="Masukkan Jenis Pesawat" required>
                    </div>
                    <div class="jarak">
                         <label for="tahun_pembuatan">Tahun Pembuatan</label>
                         <input type="number" id="tahun_pembuatan" name="tahun_pembuatan" placeholder="Masukkan tahun_pembuatan" required>
                    </div>
                    <button type="submit" name="register" class="btn" style="width: 100%;padding:10px;background-color: royalblue;">Tambah</button>
                </form>
            </article>
        </div>
    </main>


    <footer>
        <p>&#169 Travelku <i class="fab fa-accusoft"></i> 2022</p>
    </footer>

    
</body>
</html>