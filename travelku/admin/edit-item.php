<?php
session_start();

if (!isset($_SESSION['admin'])) {
   echo "<script>
         window.location.replace('../login.php');
       </script>";
  exit;
}
 
require 'functions.php';


$id = $_GET["id"];
$maskapai = query("SELECT maskapai.id as id, maskapai.kode as kode, maskapai.nama_maskapai as nama_maskapai, maskapai.harga as harga, detail_maskapai.kepemilikan as kepemilikan, detail_maskapai.jenis_pesawat as jenis_pesawat, detail_maskapai.tahun_pembuatan as tahun_pembuatan FROM maskapai JOIN detail_maskapai ON maskapai.kode = detail_maskapai.kode WHERE maskapai.id = $id")[0];

if (isset($_POST["submit"])) {

  if (ubah($_POST) > 0 ) {
    echo "
      <script>
        alert('Data Berhasil Diubah!');
        window.location.href='index.php';
      </script>
    ";
  } else {
    echo "
      <script>
      alert('Data Berhasil Diubah!');
        window.location.href='index.php';
      </script>
    ";
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
            <h2 class="judul">Edit maskapai</h2>
            <article class="card">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?= $maskapai["id"]; ?>">
                     <div class="jarak">
                         <label for="kode">Kode Maskapai</label>
                         <input type="text" id="kode" name="kode" value="<?= $maskapai["kode"]; ?>" required></input>
                    </div>
                     <div class="jarak">
                         <label for="nama_maskapai">nama_maskapai maskapai</label>
                         <input type="text" id="nama_maskapai" name="nama_maskapai" placeholder="Masukkan Nama Maskapai" value="<?= $maskapai["nama_maskapai"]; ?>" required>
                    </div>
                    <div class="jarak">
                         <label for="harga">Harga Maskapai</label>
                         <input type="number" id="harga" name="harga" value="<?= $maskapai["harga"]; ?>" required></input>
                    </div>
                    <div class="jarak">
                         <label for="kepemilikan">Kepemilikan</label>
                         <input type="text" id="kepemilikan" name="kepemilikan" value="<?= $maskapai["kepemilikan"]; ?>" required></input>
                    </div>
                    <div class="jarak">
                         <label for="jenis_pesawat">Jenis Pesawat</label>
                         <input type="text" id="jenis_pesawat" name="jenis_pesawat" value="<?= $maskapai["jenis_pesawat"]; ?>" required></input>
                    </div>
                    <div class="jarak">
                         <label for="tahun_pembuatan">Tahun Pembuatan</label>
                         <input type="number" id="tahun_pembuatan" name="tahun_pembuatan" value="<?= $maskapai["tahun_pembuatan"]; ?>" required></input>
                    </div>
                    <button type="submit" name="submit" class="btn" style="width: 100%;padding:10px;background-color: royalblue;">Ubah Maskapai</button>
                </form>
            </article>
        </div>
    </main>
    

   <footer>
        <p>&#169 Travelku <i class="fab fa-accusoft"></i> 2022</p>  
    </footer>

</body>
</html>