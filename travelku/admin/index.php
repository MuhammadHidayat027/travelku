<?php 
session_start();

if (!isset($_SESSION['admin'])) {
   echo "<script>
         window.location.replace('../login.php');
       </script>";
  exit;
}

require 'functions.php';

  $maskapai = mysqli_query($conn, "SELECT maskapai.id as id, maskapai.kode as kode, maskapai.nama_maskapai as nama_maskapai, maskapai.harga as harga, detail_maskapai.kepemilikan as kepemilikan, detail_maskapai.jenis_pesawat as jenis_pesawat, detail_maskapai.tahun_pembuatan as tahun_pembuatan FROM maskapai JOIN detail_maskapai ON maskapai.kode = detail_maskapai.kode ");
  $total_maskapai = mysqli_num_rows($maskapai);
  
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
        body {
          background-image: url("../images/bg.jpeg");
          background-size: contain;
        }
        th, td {
            padding: 10px 40px;
            text-align: justify;
        }
    </style>
</head>

<body>
     <header>
        <nav>
            <ul>
                <li><a href="pesanan.php">Data Pesanan</a></li>
                <li><a href="../logout.php" class="btn" style="border-bottom: none;">Logout <i class="fas fa-power-off fa-1x"></i></a></li>
            </ul>
        </nav>
        <div class="jumbotron">
            <h3>Travelku <i class="fab fa-accusoft"></i></h3>
        </div>
    </header>

    <main>
         <article class="card">
                <center><h3 style="color:royalblue;">Katalog Maskapai</h3></center>
        </article>

        <div id="content">
            <?php foreach ($maskapai as $pesawat) : ?>
            <div class="flex">
                <div class="card">
                    <center>
                       <table>
                           <tr>
                               <th>Kode Maskapai</th>
                               <th>Nama Pesawat</th>
                               <th>Harga Tiket</th>
                               <th>Kepemilikan</th>
                               <th>Jenis Pesawat</th>
                               <th>Tahun Pembuatan</th>
                               <th>Aksi</th>
                           </tr>
                           <tr>
                               <td><span style="color: royalblue;cursor: pointer;"><?= $pesawat["kode"]; ?></span></td>
                               <td><?= $pesawat["nama_maskapai"]; ?></td>
                               <td><?= $pesawat["harga"]; ?></td>
                               <td><?= $pesawat["kepemilikan"]; ?></td>
                               <td><?= $pesawat["jenis_pesawat"]; ?></td>
                               <td><?= $pesawat["tahun_pembuatan"]; ?></td>
                               <td>
                                <a href="edit-item.php?id=<?= $pesawat["id"]; ?>">Edit</a> | 
                                <a href="hapus-item.php?id=<?= $pesawat["id"]; ?>">Hapus</a>
                            </td>
                           </tr>
                       </table>
                    </center>
               </div>
            </div>
            <?php endforeach; ?>
        </div>

        <aside>
            <div class="card">
                <center><p>Total Maskapai : <b><span style="color: royalblue;"><?= $total_maskapai; ?></span></b></p></center>
            </div>

            <a href="tambah.php" style="text-decoration: none;"><div class="card">
                <center><p>Tambah maskapai</p></center>
            </div></a>

            <a href="pesanan.php" style="text-decoration: none;">
                <div class="card">
                    <center>Data Bookings</center>
                </div>
            </a>
        </aside>
           
    </main>

   <footer>
        <p>&#169 Travelku <i class="fab fa-accusoft"></i> 2022</p>
    </footer>

</body>
</html>